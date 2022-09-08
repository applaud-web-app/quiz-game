<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 id="timer" style="font-size:60px;">10</h1>
    <script>
        var a = 10;
        setInterval(() => {
            if(a<0){
                return;
            }
            document.getElementById('timer').innerText = a;
            a--;
        }, 1000);
    </script>
</body>
</html>