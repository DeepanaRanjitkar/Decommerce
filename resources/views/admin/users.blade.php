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
                    <h2 class="h2_font">Add User</h2>

                    <div class="card-body">
                        <h3 class="card-title h3_font">Create User form</h3>
                        <form action="{{url('/add_users')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Username</label>
                                <input type="text" class="form-control bg-white" name="name" id="exampleInputUsername1" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control bg-white" name="email" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone1">Phone number</label>
                                <input type="number" class="form-control bg-white" name="phone" id="exampleInputPhone1" placeholder="Phone number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAddress1">Address</label>
                                <textarea class="form-control bg-white" name="address" id="exampleInputAddress1" placeholder="Address" cols="30" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control bg-white" name="password" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                <input type="password" class="form-control bg-white" name="" id="exampleInputConfirmPassword1" placeholder="Password">
                            </div>
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input"> Remember me <i class="input-helper"></i></label>
                            </div>
                            <input type="submit" name="submit" class="btn btn-success" value="Add User">
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </form>
                    </div>




                </div>

                <table class="table-center">
                    <tr>
                        <td>Users Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Action</td>
                    </tr>
                    @foreach($data as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{ url('delete_user', $data->id) }}">Delete</a></td>
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
