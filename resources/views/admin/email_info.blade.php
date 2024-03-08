<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.css')
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
                <div class="card-body" style="margin: auto; width: 60%; border: 5px solid white; border-radius: 2%">
                    <h1 style="text-align: center; font-size: 25px">Send Email To <br>{{$order->email}}</h1>
                    <form action="{{url('send_user_email', $order->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEgreeting">Email Greeting : </label>
                            <input type="text" class="form-control bg-white" style="color: black" name="greeting" id="exampleInputEgreeting" placeholder="Write Your Greetings" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEfirstline">Email First Line : </label>
                            <input type="text" class="form-control bg-white" style="color: black" name="firstline" id="exampleInputEfirstline" placeholder="Write The First Line" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEbody">Email Body : </label>
                            <input type="text" class="form-control bg-white" style="color: black" name="body" id="exampleInputEbody" placeholder="Write The Email Body" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEbutton">Email Button Name : </label>
                            <input type="text" class="form-control bg-white" style="color: black" name="button" id="exampleInputEbutton" placeholder="Write The Button Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEurl">Email URL : </label>
                            <input type="text" class="form-control bg-white" style="color: black" name="url" id="exampleInputEurl" placeholder="Enter Url">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputElastline">Email Last Line : </label>
                            <input type="text" class="form-control bg-white" style="color: black" name="lastline" id="exampleInputElastline" placeholder="Write The Last Line" required>
                        </div>
                        <div class="btn_css">
                            <input type="submit" name="submit" class="btn btn-success" value="Send Email">
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
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
