<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        $data = DB::table('participants')->where('user_id',Auth::id())->first();
        $partcData = DB::table('participants')->select('*')->get();
    @endphp
    <table>
        <tr>
            <td>name</td>
            <td>{{Auth::user()->name}}</td>
        </tr>
        <tr>
            <td>UserId</td>
            <td>{{Auth::user()->id}}</td>
        </tr>
    </table>

    <br>
    <table>
        <tr>
            <td>user_id</td>
            <td>c_user_id</td>
        </tr>
        @foreach ($partcData as $item)
           
            <tr>
                <td>{{$item->user_id}}</td>
                <td>{{$item->c_user_id}}</td>
            </tr>
        @endforeach
    </table>

    @if(!$data)
        <a href="javascript:void(0)" id="participate">Participate</a>
    @else
        <a href="javascript:void(0)">Looking For Participants</a>
    @endif

<script>
    var userId = "{{Auth::id()}}";
</script>
<script src="{{ mix('js/participate.js') }}"></script>
<script>
    document.getElementById('participate').addEventListener("click",function(){
        fetch('{{url("store-participate")}}')
        .then((response) => response.json())
        .then((data) => {
            document.getElementById('participate').innerText = "Looking For Participants";
        });
    });
</script>
</body>
</html>