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
        .h3_font{
            font-size: 20px;
        }
        .input_color{
            color: black;
        }
        .table-center{
            margin: 30px auto;
            width: 50%;
            border: 3px solid white;
        }
        .form-control{
            width: 100%;
        }
        .bg-white{
            background-color: white;
            color: black;
        }
        .btn_css{
            margin-top: 5%;
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

                <div class="table-center">
                    <h2 class="h2_font">Update Product</h2>
                    {{--------------- Form Starts Here ----------------------}}
                    <div class="card-body">
                        <h3 class="card-title h3_font">Create Product form</h3>
                        <form action="{{url('/update_product_confirm', $product->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputPtitle1">Product Title</label>
                                <input type="text" class="form-control bg-white" name="title" id="exampleInputPtitle1" placeholder="Enter Product Title" required value="{{ $product->title }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPdescription1">Product Description</label>
                                <input type="text" class="form-control bg-white" name="description" id="exampleInputPdescription1" placeholder="Write a description" required value="{{ $product->description }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPprice1">Product Price</label>
                                <input type="number" class="form-control bg-white" name="price" min="1" id="exampleInputPprice1" placeholder="Enter Product Price" required value="{{ $product->price }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPdiscount1">Discount Price</label>
                                <input type="number" class="form-control bg-white" name="discount" id="exampleInputPdiscount1" placeholder="Enter Product discount" value="{{ $product->discount_price }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPqnty1">Product Quantity</label>
                                <input type="number" class="form-control bg-white" name="quantity" min="1" id="exampleInputPqnty1" placeholder="Mention the Quantity" required value="{{ $product->quantity }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPcat1">Product Category</label>
                                <select id="exampleInputPcat1" name="category" class="form-control bg-white" required>
                                    <option value="{{ $product->category }}" selected>{{ $product->category }}</option>
                                    @foreach($category as $category)
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Current Product Image</label>
                                <img height="100" width="100" src="/products/{{$product->image}}"
                                     alt="{{ $product->title }}">
                            </div>
                            <div class="form-group">
                                <label>Select New Product Image</label>
                                <div><input type="file" name="image" ></div>
                            </div>
                            <div class="btn_css">
                                <input type="submit" name="submit" class="btn btn-success" value="Update Product">
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div>
                    {{-------------- Form Ends Here ------------}}
                </div>


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
