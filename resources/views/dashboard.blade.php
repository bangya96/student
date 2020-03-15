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
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100" style="margin-bottom: 50px">
            <text>{{$i = 0}}</text>
            <div class="row">
                @foreach($cache as $caches)
                    <audio id="{{$caches->id}}">
                        <source src="{{asset($caches->audio)}}" type="audio/ogg">
                    </audio>
                    <a class="icontop" href="/delete/{{$i}}">
                        <img src="{{asset($caches->image)}}" width="100" height="100">
                        <p>{{$caches->nama}}</p>
                        <text>{{$i++}}</text>
                    </a>
                @endforeach
            </div>
            {{--<button onclick='playall({{$array}})' style="border: #fff solid 2px; width: 100px; background-color: #7ba1ff;">Mainkan</button>--}}
        </div>

        <div style="width: 960px; background: #bcbcbc; border-radius: 10px; overflow: hidden; padding: 20px">
            <div class="row">
                <a class="buttonpage" href="/dashboard">Kemahuaan</a>
                <a class="buttonpage" href="/page2">Makanan</a>
                <a class="buttonpage" href="/page3">Perasaan</a>
                <a class="buttonpage" style="background-color: #2fff1f" onclick='playall({{$array}})' href="#">Mainkan</a>
                <a class="buttonpage" style="background-color: red" href="/clear">Padam Semua</a>
            </div>
        </div>
        <br>

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
