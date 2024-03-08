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
          href="images/favicon.png"
          type="">
    <title>Famms -
        Fashion HTML
        Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet"
          type="text/css"
          href="home/css/bootstrap.css"/>
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css"
          rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="home/css/style.css"
          rel="stylesheet"/>
    <!-- responsive style -->
    <link href="home/css/responsive.css"
          rel="stylesheet"/>


</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

<!-- product section -->
@include('home.product')
<!-- end product section -->

{{--The Comment Section Starts Here--}}

<div style="text-align: center;">
    <h1 style="font-size: 30px; text-align: center; padding-top: 10px; padding-bottom: 10px;">
        All
        Comments</h1>
    <form action="{{ url('add_comment') }}"
          method="post">
        @csrf
        <div>
            <textarea
                    style="height: 150px; width: 600px;"
                    PLACEHOLDER="Write Your Comment Here..."
                    name="comment">
            </textarea>
        </div>
        <div style="padding: 0 0 20px 0">
            <input class="btn btn-primary"
                   type="submit"
                   value="Comment">
        </div>
    </form>
</div>
<div style="padding-left: 20%">
    <h1 style="font-size: 20px; padding-bottom: 20px">
        All
        Comments</h1>

    @foreach($comments as $comment)
        <div>
            <b>{{$comment->name}}</b>
            <p>{{$comment->comment}}</p>

            <a href="javascript:void(0);"
               onclick="reply(this)"
               data-Commentid="{{$comment->id}}" style="color: blue">Reply</a>
            @foreach($replies as $reply)
                @if($reply->comment_id == $comment->id)
                    <div style="padding-left: 3%; padding-top: 10px; padding-bottom: 10px;">
                        <b>{{$reply->name}}</b>
                        <p>{{$reply->reply}}</p>
                        <a href="javascript:void(0);"
                           onclick="reply(this)"
                           data-Commentid="{{$comment->id}}" style="color: blue">Reply</a>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach


    <div style="display: none;"
         class="replyDiv">
        <form action="{{ url('add_reply') }}"
              method="post">
            @csrf
            <input type="text"
                   name="commentID"
                   id="commentID"
                   hidden="">
            <textarea
                    name="reply"
                    id=""
                    cols="10"
                    rows="5"
                    placeholder="Write the reply"
                    style="width: 50%"></textarea><br>
            <button type="submit"
                    value="Reply"
                    class="btn btn-primary"
                    style="color: #000000;">
                Reply
            </button>
            <a href="javascript:void(0);"
               class="btn btn-danger"
               onclick="reply_close(this)">Close</a>
        </form>
    </div>
</div>
</div>
{{--The Comment Section Ends Here--}}


<!-- subscribe section -->
@include('home.subscribe')
<!-- end subscribe section -->
<!-- client section -->
@include('home.client')
<!-- end client section -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
<script>
    function reply(caller) {
        document.getElementById('commentID').value = $(caller).attr('data-Commentid');
        $('.replyDiv').insertAfter($(caller));
        $('.replyDiv').show();
    }

    function reply_close(caller) {
        $('.replyDiv').hide();
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
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
