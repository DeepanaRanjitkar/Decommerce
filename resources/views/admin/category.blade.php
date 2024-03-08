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
        }
        .input_color{
            color: black;
        }
        .table-center{
            margin: 30px auto;
            width: 50%;
            text-align: center;
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

                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>

                    <form action="{{ url('/add_category') }}" method="post">
                        @csrf
                        <input type="text" name="category" class="input_color" id="" placeholder="Enter Category name">
                        <input type="submit" name="submit" class="btn btn-primary" id="" value="Add Category">

                    </form>

                </div>

                <table class="table-center">
                    <tr>
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>
                    @foreach($data as $data)
                    <tr>
                        <td>{{ $data->category_name }}</td>
                        <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{ url('delete_category', $data->id) }}">Delete</a></td>
                    </tr>
                    @endforeach
                </table>

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
