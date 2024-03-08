<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Notifications\SendEmailNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Notification;

//use PDF;

class AdminController extends Controller
{
    //    Category Handling Function Starts Here
    public function view_category()
    {
        if (Auth::id()) {
            $data = category::all();

            return view('admin.category', compact('data'));
        } else {
            return redirect('login');
        }
    }

    public function add_category(Request $request)
    {
        if (Auth::id()) {
            $data = new category;

            $data->category_name = $request->category;

            $data->save();

            return redirect()->back()->with('message', 'Category added Successfully!');

        } else {
            return redirect('login');
        }

    }

    public function delete_category($id)
    {
        if (Auth::id()) {
            $data = category::find($id);
            $data->delete();
            return redirect()->back()->with('message', 'Category deleted Successfully!');
        } else {
            return redirect('login');
        }
    }
    //    Category Handling Function Ends Here

    //    Users Handling Function Starts Here

    public function view_users()
    {
        if (Auth::id()) {
            $data = User::all()->makeHidden(['password']);
            return view('admin.users', compact('data'));
        } else {
            return redirect('login');
        }
    }

    public function add_users(Request $request)
    {
        if (Auth::id()) {
            $data = new user;

            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->password = bcrypt($request->password);

            $data->save();

            return redirect()->back()->with('message', 'User added Successfully!');
        } else {
            return redirect('login');
        }

    }

    public function delete_user($id)
    {
        if (Auth::id()) {
            $data = user::find($id);
            $data->delete();
            return redirect()->back()->with('message', 'User deleted Successfully!');
        } else {
            return redirect('login');
        }
    }

    //    Users Handling Function Ends Here

    //    Products Handling Function Starts Here
    public function view_product()
    {
        if (Auth::id()) {
            $category = category::all();
            return view('admin.product', compact('category'));
        } else {
            return redirect('login');
        }
    }

    public function add_product(Request $request)
    {
        if (Auth::id()) {
            $product = new product;

            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->discount_price = $request->discount;
            $product->category = $request->category;
            //Code To Save Image Starts
            $image = $request->image;
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $image_name);
            $product->image = $image_name;
            //Code To Save Image Ends


            $product->save();

            return redirect()->back()->with('message', 'Product added Successfully!');
        } else {
            return redirect('login');
        }

    }

    public function show_product()
    {
        if (Auth::id()) {
            $product = product::all();
            return view('admin.show_product', compact('product'));
        } else {
            return redirect('login');
        }
    }

    public function delete_product($id)
    {
        if (Auth::id()) {
            $product = product::find($id);
            $product->delete();
            return redirect()->back()->with('message', 'Product deleted Successfully!');
        } else {
            return redirect('login');
        }
    }

    //    Products Handling Function Ends Here

    public function update_product($id)
    {
        if (Auth::id()) {
            $category = category::all();
            $product = product::find($id);
            return view('admin.update_product', compact(['product', 'category']));
        } else {
            return redirect('login');
        }
    }

    public function update_product_confirm(Request $request, $id)
    {
        if (Auth::id()) {

            $product = product::find($id);

            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->discount_price = $request->discount;
            $product->quantity = $request->quantity;
            $product->category = $request->category;
            //Code To Save Image Starts
            $image = $request->image;
            if ($image) {
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $request->image->move('products', $image_name);
                $product->image = $image_name;
            }
            //Code To Save Image Ends
            $product->save();

            return redirect()->back()->with('message', 'Product Updated Successfully!');
        } else {
            return redirect('login');
        }
    }

    public function order()
    {
        if (Auth::id()) {

            $order_list = order::all();

            return view('admin.order', compact('order_list'));
        } else {
            return redirect('login');
        }
    }

    public function delivered($id)
    {
        if (Auth::id()) {

            $order = order::find($id);
            $order->delivery_status = 'Delivered';
            if ($order->payment_status == "Cash On Delivery") {
                $order->payment_status = 'Paid In Cash';
            }
            $order->save();
            return redirect()->back()->with('message', 'Status Updated Successfully!');
        } else {
            return redirect('login');
        }
    }

    public function print_pdf($id)
    {
        if (Auth::id()) {

            $order = order::find($id);
            $pdf = PDF::loadView('admin.pdf_format', compact('order'));
            $filename = $order->name . '_' . $order->phone . '_' . $order->product_title . '_' . $order->product_id . '.pdf';
            return $pdf->download($filename);
        } else {
            return redirect('login');
        }
    }

    public function search(Request $request)
    {
        if (Auth::id()) {

            $searchText = $request->search;
            $order_list = order::where('name', 'LIKE', "%$searchText%")->orWhere('phone', 'LIKE', "%$searchText%")->orWhere('product_title', 'LIKE', "%$searchText%")->get();
            return view('admin.order', compact('order_list'));
        } else {
            return redirect('login');
        }
    }

    public function send_email(Request $request, $id)
    {
        if (Auth::id()) {

            $order = order::find($id);

            return view('admin.email_info', compact('order'));
        } else {
            return redirect('login');
        }

    }

    public function send_user_email(Request $request, $id)
    {
        if (Auth::id()) {

            $order = order::find($id);

            $details = [
                'greeting' => $request->greeting,
                'firstline' => $request->firstline,
                'body' => $request->body,
                'button' => $request->button,
                'url' => $request->url,
                'lastline' => $request->lastline,
            ];

            Notification::send($order, new SendEmailNotification($details));
            return redirect()->back()->with('message', 'Email Sent Successfully!');
        } else {
            return redirect('login');
        }
    }


}

