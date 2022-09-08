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
    @endphp
    @if(!$data)
        <a href="{{url('store-participate')}}">Participate</a>
    @else
        <a href="javascript:void(0)">Looking For Participants</a>
    @endif

<script>
    var userId = "{{Auth::id()}}";
</script>
<script src="{{ mix('js/participate.js') }}"></script>

</body>
</html>