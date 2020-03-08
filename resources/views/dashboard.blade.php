<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100" style="margin-bottom: 50px">
            <div class="row">
                @foreach($cache as $caches)
                    <audio id="{{$caches->id}}">
                        <source src="{{asset($caches->audio)}}" type="audio/ogg">
                    </audio>
                    <a class="icon">
                        <img src="{{asset($caches->image)}}" width="100" height="100">
                        <p>{{$caches->id}}</p>
                    </a>
                @endforeach
            </div>
            <button onclick='playall({{$array}})' style="border: #fff solid 2px; width: 100px; background-color: #7ba1ff;">Play All</button>
        </div>

        <div class="wrap-login100">
            <div class="row" style="margin: auto;">
                @foreach($data as $datas)
                    <audio id="{{$datas->id}}">
                        <source src="{{asset($datas->audio)}}" type="audio/ogg">
                    </audio>
                    <a class="icon" onclick='UpdateStatus( {{$datas->id}} , {{$datas->long}} )'>
                        <img src="{{asset($datas->image)}}" width="100" height="100">
                        <p>{{$datas->nama}}</p>
                    </a>
                @endforeach
            </div>
        </div>
        {{--<div class="wrap-login100">--}}
            {{--<div class="login100-pic js-tilt" data-tilt>--}}
                {{--<img src="images/img-01.png" alt="IMG">--}}
            {{--</div>--}}

            {{--<form class="login100-form validate-form">--}}
					{{--<span class="login100-form-title">--}}
						{{--Member Login--}}
					{{--</span>--}}

                {{--<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">--}}
                    {{--<input class="input100" type="text" name="email" placeholder="Email">--}}
                    {{--<span class="focus-input100"></span>--}}
                    {{--<span class="symbol-input100">--}}
							{{--<i class="fa fa-envelope" aria-hidden="true"></i>--}}
						{{--</span>--}}
                {{--</div>--}}

                {{--<div class="wrap-input100 validate-input" data-validate = "Password is required">--}}
                    {{--<input class="input100" type="password" name="pass" placeholder="Password">--}}
                    {{--<span class="focus-input100"></span>--}}
                    {{--<span class="symbol-input100">--}}
							{{--<i class="fa fa-lock" aria-hidden="true"></i>--}}
						{{--</span>--}}
                {{--</div>--}}

                {{--<div class="container-login100-form-btn">--}}
                    {{--<button class="login100-form-btn">--}}
                        {{--Login--}}
                    {{--</button>--}}
                {{--</div>--}}

                {{--<div class="text-center p-t-12">--}}
						{{--<span class="txt1">--}}
							{{--Forgot--}}
						{{--</span>--}}
                    {{--<a class="txt2" href="#">--}}
                        {{--Username / Password?--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="text-center p-t-136">--}}
                    {{--<a class="txt2" href="#">--}}
                        {{--Create your Account--}}
                        {{--<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    </div>
</div>

<script>
    function UpdateStatus(data, long){
        document.getElementById(data).play();
        $.ajax({url: "{{ Request()->parameter }}/ajax", data:{data1:data}, success: function(result){
                setTimeout(reload, long);
            }});
    }
    function reload() {
        location.reload();
    }

    function timer(ms) {
        return new Promise(res => setTimeout(res, ms));
    }

    async function playall(datas){
        for (let i = 0; i < datas.length; i++) {
            let player = document.getElementById(datas[i].id);
            player.currentTime=0;
            player.play();
            await timer(datas[i].long);
        }
    }
</script>


<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
