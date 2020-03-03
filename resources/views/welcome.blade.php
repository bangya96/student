<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Web</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            .top{
                /*height: 100px;*/
                margin: 10px 30px 10px 30px;
                border: red solid 2px;
            }
            .content{
                margin: 10px 30px 10px 30px;
                border: red solid 2px;
            }
            .box{
                margin: 10px;
                border: red solid 2px;
                height: 100px;
                width: 100px;
                float: left;
            }
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <body>
    <div class="top">
        <button onclick='playall({{$array}})'>Play All</button>
        <div class="row">
            @foreach($cache as $caches)
                <audio id="{{$caches->id}}">
                    <source src="{{asset($caches->audio)}}" type="audio/ogg">
                </audio>
                <a class="box">
                    <img src="{{asset($caches->image)}}" width="100" height="100">
                    <p>{{$caches->id}}</p>
                </a>
            @endforeach
        </div>
    </div>
    <div class="content">
        <div class="row">
            @foreach($data as $datas)
                <audio id="{{$datas->id}}">
                    <source src="{{asset($datas->audio)}}" type="audio/ogg">
                </audio>
            <a class="box" onclick='UpdateStatus( {{$datas->id}} , {{$datas->long}} )'>
                <img src="{{asset($datas->image)}}" width="100" height="100">
                <p>{{$datas->id}}</p>
            </a>
            @endforeach
        </div>
    </div>
    </body>
<script>
    function UpdateStatus(data, long){
        document.getElementById(data).play();
        $.ajax({url: "http://web.test/ajax", data:{data1:data}, success: function(result){
                setTimeout(reload, long);
            }});
    }
    function reload() {
        location.reload();
    }
    function playall(datas){
        console.log(datas);
        var aud = document.getElementById(datas[0]['id']).play();
        console.log();





    }
</script>
</html>
