<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2><br>
            <div>
                <form action="{{ url('product_search') }}" method="get">
                    @csrf
                    <input type="text" name="search" placeholder="Search.." style="width: 500px">
                    <input type="submit"
                           value="search">
                </form>
            </div>
            
        </div>
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
        <div class="row">
            @foreach($product as $products)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ url('product_details', $products->id) }}" class="option1">
                                Product Details
                            </a>

                            <form action="{{ url('add_cart', $products->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="number"
                                               name="quantity"
                                               value="1"
                                               min="1"
                                               id=""
                                        style="width: 100px">
                                    </div>
                                    <div class="col-md-3 ">
                                        <input type="submit"
                                               value="Add to cart" class="bradius">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="products/{{ $products->image }}" width="80%" height="100%" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$products->title}}
                        </h5>
                        @if($products->discount_price != "")
                            <h6 style="color: red">
                                <span>Discounted Price</span><br>
                                ${{$products->discount_price}}
                            </h6>
                            <span>Price</span>
                            <h6 style="text-decoration: line-through; color: dodgerblue">
                                ${{$products->price}}
                            </h6>
                        @else
                            <span>Price</span>
                            <h6 style="color: dodgerblue">
                                ${{$products->price}}
                            </h6>
                        @endif


                    </div>
                </div>
            </div>
            @endforeach
            <span style="padding-top: 20px;">
            {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
            </span>
{{--                For pagination--}}
        </div>
        <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div>
    </div>
</section>
