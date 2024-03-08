<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use Session;
use Stripe;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{

    public function index()
    {

        $product = product::paginate(10);
        $comments = comment::orderby('id', 'desc')->paginate(5);
        $replies = reply::paginate(5);
        return view('home.userpage', compact('product', 'comments', 'replies'));

    }

    public function redirect()
    {
//        $usertype = Auth::user()->usertype;

        if (Auth::user()->usertype == '1')
        {
            $total_product = product::all()->count();
            $total_order = order::all()->count();
            $total_customer = user::all()->count();

            $orders = order::all();
            $total_revenue = 0;
            foreach ($orders as $order){
                $total_revenue += $order->price;
            }

            $total_delivered = $order::where('delivery_status', '=', 'Delivered')->get()->count();
            $total_processing = $order::where('delivery_status', '=', 'Processing')->get()->count();

            return view('admin.home', compact('total_product', 'total_order', 'total_customer', 'total_revenue', 'total_delivered', 'total_processing'));

        }
        else{

            $product = product::paginate(10);
            $comments = comment::orderby('id', 'desc')->paginate(5);
            $replies = reply::paginate(5);
            return view('home.userpage', compact('product', 'comments', 'replies'));

        }
    }


    public function product_details($id)
    {
        $product = product::find($id);
        return view('home.product_details', compact('product'));
    }


    public function add_cart(Request $request, $id)
    {
        if (Auth::id()){
            $user = Auth::user(); // Gets the logged-in user data
//            dd($user); >> attribute>>
            $product = product::find($id);


            $product_exist_id = cart::where('product_id', '=', $id)->where('user_id', '=', $user->id)->get('id')->first();

            if($product_exist_id){
                $cart = cart::find($product_exist_id)->first();
                $cart->quantity += $request->quantity;
                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price * $cart->quantity;
                }
                else{
                    $cart->price = $product->price * $cart->quantity;

                }
                $cart->save();
                Alert::success('Product Added To Cart successfully!', 'The Product Has Been Successfully Added To Your Cart');
                return redirect()->back()->with('message', 'Product Added To Cart Successfully!');
            }else{
                $cart = new cart;

                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->product_title = $product->title;
                $cart->quantity = $request->quantity;

                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price * $request->quantity;
                }
                else{
                    $cart->price = $product->price * $request->quantity;

                }
                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->user_id = $user->id;

                $cart->save();
                Alert::success('Product Added To Cart successfully!', 'The Product Has Been Successfully Added To Your Cart');
                return redirect()->back()->with('message', 'Product Added To Cart Successfully!');
            }

        }
        else{
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if (Auth::id()){
            $user_id = Auth::user()->id;

            $cart_items = cart::where('user_id', '=', $user_id)->get();

            return view('home.showcart', compact('cart_items'));
        }
        else{
            return redirect('login');
        }

    }

    public function remove_cart($id)
    {
        $item = cart::find($id);
        $item->delete();
        return redirect()->back()->with('message', 'Item Removed From Cart Successfully!');
    }

    public function cash_order()
    {
        $user_id  = Auth::user()->id;

        $cart_data = cart::where('user_id', '=', $user_id)->get();

        foreach ($cart_data as $data){
            $order_item = new Order;

            $order_item->name = $data->name;
            $order_item->email = $data->email;
            $order_item->phone = $data->phone;
            $order_item->address = $data->address;
            $order_item->user_id = $data->user_id;
            $order_item->product_title = $data->product_title;
            $order_item->quantity = $data->quantity;
            $order_item->price = $data->price;
            $order_item->image = $data->image;
            $order_item->product_id = $data->product_id;
            $order_item->payment_status = 'Cash On Delivery';
            $order_item->delivery_status = 'Processing';

            $order_item->save();

            $cart_item = cart::find($data->id);
            $cart_item->delete();

        }

        return redirect()->back()->with('message', 'Order Placed Successfully!');


    }

    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks For the Payment."
        ]);

        $user_id  = Auth::user()->id;

        $cart_data = cart::where('user_id', '=', $user_id)->get();

        foreach ($cart_data as $data){
            $order_item = new Order;

            $order_item->name = $data->name;
            $order_item->email = $data->email;
            $order_item->phone = $data->phone;
            $order_item->address = $data->address;
            $order_item->user_id = $data->user_id;
            $order_item->product_title = $data->product_title;
            $order_item->quantity = $data->quantity;
            $order_item->price = $data->price;
            $order_item->image = $data->image;
            $order_item->product_id = $data->product_id;
            $order_item->payment_status = 'Paid Using Card';
            $order_item->delivery_status = 'Processing';

            $order_item->save();

            $cart_item = cart::find($data->id);
            $cart_item->delete();

        }

        Session::flash('success', 'Payment Successful!');

        return back();
    }


    public function show_orders()
    {
        if (Auth::id()){
            $user_id = Auth::user()->id;

            $order_items = order::where('user_id', '=', $user_id)->get();

            return view('home.orders', compact('order_items'));
        }else{
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {

        $order = order::find($id);
        $order->delivery_status = 'Order Cancelled';
        $order->save();

        return redirect()->back()->with('message', 'Order Cancelled!');

    }

    public function add_comment(Request $request)
    {
        if (Auth::id()){
            $comment = new Comment;
            $comment->name = Auth::user()->name;
            $comment->comment = $request->comment;
            $comment->user_id = Auth::user()->id;
            $comment->save();
            return redirect()->back()->with('message', 'Commented Successfully!');
        }else{
            return redirect('login');
        }
    }
    public function add_reply(Request $request)
    {
        if (Auth::id()){
            $reply = new Reply;
            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;
            $reply->comment_id = $request->commentID;
            $reply->reply = $request->reply;
            $reply->save();
            return redirect()->back()->with('message', 'Replied Successfully!');
        }else{
            return redirect('login');
        }
    }
    public function product_search(Request $request)
    {
        $search_text = $request->search;

        $product = product::where('title', 'LIKE', "%$search_text%")->orWhere('price', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "%$search_text%")->orWhere('discount_price', 'LIKE', "%$search_text%")->paginate(10);
        $comments = comment::orderby('id', 'desc')->paginate(5);
        $replies = reply::paginate(5);
        return view('home.all_products', compact('product', 'comments', 'replies'));
    }

    public function all_products()
    {
        $product = product::paginate(10);
        $comments = comment::orderby('id', 'desc')->paginate(5);
        $replies = reply::paginate(5);
        return view('home.all_products', compact('product', 'comments', 'replies'));
    }






}
