<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge"/>
    <!-- Mobile Metas -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Site Metas -->
    <meta name="keywords"
          content=""/>
    <meta name="description"
          content=""/>
    <meta name="author"
          content=""/>
    <link rel="shortcut icon"
          href="/images/favicon.png"
          type="">
    <title>Famms -
        Fashion HTML
        Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet"
          type="text/css"
          href="{{asset('home/css/bootstrap.css')}}"/>
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css')}}"
          rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}"
          rel="stylesheet"/>
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}"
          rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>

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
        }

        .total_div_dgn {
            text-align: center;
            margin-top: 1%;
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
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <?php $total_price = 0 ?>
            @foreach($cart_items as $cart_items)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-1 py-4 div_width">
                        <img src="products/{{$cart_items->image}}"
                             class="w-16 md:w-32 max-w-full max-h-full"
                             alt="{{$cart_items->product_title}}"
                             style="width: 200px; height: 100px; box-sizing: border-box">
                    </td>
                    <td class="px-4 py-4 dark:text-white text-center">
                        {{$cart_items->product_title}}
                    </td>
                    <td class="px-4 py-4 text-center">
                        {{$cart_items->quantity}}
                        pices
                    </td>
                    <td class="px-4 py-4 text-center font-semibold text-gray-900 dark:text-white">
                        ${{$cart_items->price}}
                    </td>
                    <td class="px-4 py-4 text-center">

                        <a href="{{ url('remove_cart', $cart_items->id) }}"
                           onclick="confirmation(event)"
                           class="btn btn-danger border-amber-950"><i
                                    class="fa fa-trash"></i></a>

                        <a href="{{ url('update_cart', $cart_items->id) }}"
                           onclick="return confirm('Are you sure?')"
                           class="btn btn-primary text-center"><i
                                    class="fa fa-pencil "></i></a>
                    </td>
                </tr>

                    <?php $total_price += $cart_items->price ?>
            @endforeach
            </tbody>
        </table>
        <div class="total_div_dgn">
            <h1 class="total_tb_dgn">
                Total
                ->
                ${{ $total_price }}</h1>

            <h2 style="font-size: 25px; padding: 4px; margin-top: 1%">
                Proceed
                To
                Pay</h2>

            <a href="{{ url('cash_order') }}"
               class="btn btn-warning m-2 mb-4">Pay
                With
                Cash</a>
            <a href="{{ url('stripe', $total_price) }}"
               class="btn btn-warning m-2 mb-4">Pay
                With
                Card</a>
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

<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
            title: "Are you sure to cancel this product",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            });
    }
</script>
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
