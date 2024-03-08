<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
        }
        .h2_font{
            font-size: 40px;
            padding: 10px;
            text-align: center;
        }
        .table-center{
            margin: 30px auto;
            width: 50%;
            border: 3px solid white;
            text-align: center;
        }
        .bg-white{
            color: black;
        }
        .tborder{
            border: 3px solid white;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <h2 class="h2_font">Orders List</h2>
                {{-- Table Code Starts Here --}}
                    <div>
                        <form action="{{ url('search') }}"
                              method="GET">
                            @csrf
                            <input type="text"
                                   name="search"
                                   placeholder="Search..." style="outline:none; color: black">
                            <i class="btn btn-outline-facebook fa fa-search" aria-hidden="true">
                                <input type="submit"
                                       name="submit"
                                       id="">
                            </i>
                        </form>
                    </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg div_center">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-amber-50 tborder table-center">
                        <thead class="text-xs text-white font-weight-bold font-extrabold uppercase bg-blue-600 dark:bg-blue-600 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-14 py-3 pl-1 text-center">
                                Customer's Name
                            </th>
                            <th scope="col" class="px-0.5 py-3 text-center">
                                Customer's Email
                            </th>
                            <th scope="col" class="px-3 py-3 text-center">
                                Customer's Phone
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Customer's Address
                            </th>
                            <th scope="col" class="px-0.5 py-3 text-center">
                                Product ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Product Name
                            </th>
                            <th scope="col" class="px-0.5 py-3 text-center">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Image
                            </th>
                            <th scope="col" class="px-2 py-3 text-center">
                                Payment Status
                            </th>
                            <th scope="col" class="px-3 py-3 text-center">
                                Delivery Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($order_list as $order)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-4 py-4 text-center">
                                    {{$order->name}}
                                </td>
                                <td class="px-0.5 py-4 text-center w-5">
                                    {{$order->email}}
                                </td>
                                <td class="px-4 py-4 text-center">
                                    {{$order->phone}}
                                </td>
                                <td class="px-4 py-4 text-center">
                                    {{$order->address}}
                                </td>
                                <td class="px-0.5 py-4 text-center">
                                    {{$order->product_id}}
                                </td>
                                <td class="px-4 py-4 text-center">
                                    {{$order->product_title}}
                                </td>
                                <td class="px-0.5 py-4 text-center">
                                    {{$order->quantity}}
                                </td>
                                <td class="px-4 py-4 text-center">
                                    {{$order->price}}
                                </td>
                                <td class="text-center">
                                    <img src="products/{{$order->image}}" class="w-16 md:w-32 max-w-full max-h-full"
                                         style="height: 100%; width: 100%" alt="{{$order->product_title}}">
                                </td>
                                <td class="px-2 py-4 text-center">
                                    {{$order->payment_status}}
                                </td>
                                <td class="px-2 py-4 text-center font-bold font-weight-bold">
                                    <span> {{$order->delivery_status}}</span>
                                    <a href="{{ url('delivered', $order->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm border-amber-950" style="width:100%;height: 20px;padding:0 2px 0 2px;">

                                        <i>
                                            <div class="fa fa-truck"
                                              aria-hidden="true"
                                              style="padding-top: 4px; display: block; float: left">

                                            </div>
                                            <div style="font-size: 10px; padding-top: 4px; display: block; font-weight: bold">
                                                ->change
                                            </div>
                                        </i>
                                    </a>
                                </td>


                                <td class="px-2 py-1 text-center">

                                    <a href="{{ url('print_pdf', $order->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger" style="padding:0 2px 4px 2px; width: 50%; margin: 5%">
                                        <i class="fa fa-download" aria-hidden="true" style="margin: auto; padding-top: 6px;"></i>
                                    </a>

                                    <a href="{{ url('send_email', $order->id) }}" class="btn btn-behance" style="padding:0 2px 4px 2px; width: 50%; margin: 5%"><i class="fa fa-envelope-o" style="margin: auto; padding-top: 6px;"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="16" style="text-align: center; font-weight: bold; padding-top: 10px; background-color: white; color: black">No data found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>

                {{-- Table Code Ends Here --}}
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
</body>
</html>
