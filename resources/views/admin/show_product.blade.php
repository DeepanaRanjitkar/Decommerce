<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
        }
        .table-center{
            margin: 30px auto;
            width: 50%;
            border: 3px solid white;
            text-align: center;
        }
        .bg-white{
            background-color: skyblue;
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
                <h2 class="h2_font">Products List</h2>
                {{-- Table Code Starts Here --}}


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg div_center">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-amber-50 tborder table-center">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-blue-600 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-14 py-3 pl-5">
                                Images
                            </th>
                            <th scope="col" class="px-1 py-3 text-center">
                                Product Name
                            </th>
                            <th scope="col" class="px-3 py-3 text-left">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Discount price
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4 text-center">
                                <img src="products/{{$product->image}}" class="w-16 md:w-32 max-w-full max-h-full ml-2" alt="{{$product->title}}">
                            </td>
                            <td class="px-4 py-4 font-semibold text-gray-900 dark:text-white text-center">
                                {{$product->title}}
                            </td>
                            <td class="px-4 py-4 text-center">
                                <div class="flex items-center">
                                    {{$product->quantity}} pices
                                </div>
                            </td>
                            <td class="px-4 py-4 text-center font-semibold text-gray-900 dark:text-white">
                                ${{$product->price}}
                            </td>
                            <td class="px-4 py-4 text-center font-semibold text-gray-900 dark:text-white">
                                @if($product->discount_price=="")
                                    $0
                                @else
                                    ${{$product->discount_price}}
                                @endif
                            </td>
                            <td class="px-4 py-4 text-center font-semibold text-gray-900 dark:text-white">
                                {{$product->category}}
                            </td>
                            <td class="px-4 py-4 text-center font-semibold text-gray-900 dark:text-white">
                                {{$product->description}}
                            </td>
                            <td class="px-4 py-4 text-center">

                                <a href="{{ url('delete_product', $product->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm border-amber-950"><i class="fa fa-trash ml-1"></i></a>

                                <a href="{{ url('update_product', $product->id) }}" class="btn btn-behance btn-sm"><i class="fa fa-pencil ml-1"></i></a>
                            </td>
                        </tr>
                        @endforeach
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
