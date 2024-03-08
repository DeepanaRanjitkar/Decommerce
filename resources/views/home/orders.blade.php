<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="/images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />


    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
        }

        .table-center {
            margin: auto;
            width: 30%;
            border: 3px solid white;
            text-align: center;
            color: black;
        }

        .bg-white {
            background-color: skyblue;
            color: black;
        }

        .tborder {
            width: 75%;
            border: 3px solid black;
        }

        .th_dgn {
            background-color: black;
        }

        .div_width {
            width: 200px;
        }

        .total_tb_dgn {
            border: 3px dotted color-mix(in lch, orangered, yellow);
            height: 50px;
            width: 250px;
            font-size: 30px;
            color: #ff424d;
            background-color: #191c24;
            margin: auto;
            padding-top: 5px;
            padding-top: 5px;
        }

        .total_div_dgn {
            text-align: center;
            margin-top: 1%;
            margin-bottom: 1%;
        }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true">
                x
            </button>
            {{ session()->get('message') }}
        </div>
    @endif
    {{--Main Section Starts Here--}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg div_center">
        <table class="text-md-center text-left rtl:text-right text-black-500 dark:text-black-400 border-amber-50 tborder table-center">
            <thead class="text-xs text-white uppercase dark:text-white th_dgn">
            <tr>
                <th scope="col"
                    class="px-1 py-3 text-center">
                    Images
                </th>
                <th scope="col"
                    class="px-1 py-3 text-center">
                    Product
                    Name
                </th>
                <th scope="col"
                    class="px-1 py-3 text-center">
                    Quantity
                </th>
                <th scope="col"
                    class="px-1 py-3 text-center">
                    Price
                </th>
                <th scope="col"
                    class="px-1 py-3 text-center">
                    Payment
                    Status
                </th>
                <th scope="col"
                    class="px-1 py-3 text-center">
                    Delivery
                    Status
                </th>
                <th scope="col"
                    class="px-1 py-3 text-center">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <?php $total_price = 0 ?>
            @foreach($order_items as $order_item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-1 py-2 div_width">
                        <img src="products/{{$order_item->image}}"
                             class="w-16 md:w-32 max-w-full max-h-full"
                             alt="{{$order_item->product_title}}"
                             style="width: 80%; height: 20vh; box-sizing: border-box">
                    </td>
                    <td class="px-4 py-4 dark:text-white text-center">
                        {{$order_item->product_title}}
                    </td>
                    <td class="px-4 py-4 text-center">
                        {{$order_item->quantity}}
                        pices
                    </td>
                    <td class="px-4 py-4 text-center font-semibold text-gray-900 dark:text-white">
                        ${{$order_item->price}}
                    </td>
                    <td class="px-4 py-4 text-center font-semibold text-gray-900 dark:text-white">
                        {{$order_item->payment_status}}
                    </td>
                    <td class="px-4 py-4 text-center font-semibold text-gray-900 dark:text-white">
                        {{$order_item->delivery_status}}
                    </td>
                    <td class="px-1 py-1 text-center">

                        @if($order_item->delivery_status == 'Processing')
                            <a href="{{ url('cancel_order', $order_item->id) }}"
                               onclick="return confirm('Are you sure?')"
                               class="btn btn-danger border-amber-950" style="height: 20%; width: 80%;">
                                <i>
                                    <div class="fa fa-trash"></div>
                                    <div class="">Cancel Order</div>
                                </i>
                            </a>
                        @elseif($order_item->delivery_status == 'Order Cancelled')
                            <div class="">Product Delivery Cancelled.</div>
                        @else
                            <div class="">Product Already Delivered.</div>
                        @endif

                        {{--                        <a href="{{ url('update_cart', $order_item->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-primary text-center"><i class="fa fa-pencil "></i></a>--}}
                    </td>
                </tr>

                    <?php $total_price += $order_item->price ?>
            @endforeach
            </tbody>
        </table>
        <div class="total_div_dgn">
            <h1 class="total_tb_dgn">
                Total
                ->
                ${{ $total_price }}</h1>
        </div>

    </div>
    {{--Main Section Ends Here--}}
</div>


<!-- footer start -->
@include('home.footer')
<!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">
        © 2021 All
        Rights
        Reserved By
        <a href="https://html.design/">Free
            Html
            Templates</a><br>

        Distributed
        By
        <a href="https://themewagon.com/"
           target="_blank">ThemeWagon</a>

    </p>
</div>
<!-- jQery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>
</body>
</html>
