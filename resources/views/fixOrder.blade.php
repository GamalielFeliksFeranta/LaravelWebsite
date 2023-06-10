<html lang="en">
<head>
    <title>SneakItUp</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><title>Free Snow Bootstrap Website Template | Shop :: w3layouts</title>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class='fixorder'>
    <form action="{{ route('deleteProduk') }}" method="post">
        @csrf
        @method('DELETE')
        <div class="containerFix">
            <div class="popup" id="popup">
                <img src="images/404-tick.png" alt="">
                <h2>Thank You!</h2>
                <p>Your details has been successfully submitted. Thanks!</p>
                <input type="submit" name="ok" value="OK" >
            </div>
        </div>
    </form>
 

      
</body>
</html>

