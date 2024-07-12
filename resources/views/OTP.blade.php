<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
     <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
</head>
    <body style = "margin:0;
                    padding:0;
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color:darkblue">
        <div>
            <h1 style="text-align:center;
                        margin-top: 50px;
                        color:darkblue;
                    font-size:24px">OTP</h1>
            <p style="text-align:center;
                        margin-top: 20px;
                        color:darkblue;
                        font-size:15px">Chào Bạn</p>
            <p style="text-align:center;
                        margin-top: 20px;
                        color:darkblue;
                        font-size:15px">Chúng tôi xin gửi bạn một mã xác thực việc đăng ký của bạn</p>
            <p style="text-align:center;
                        margin-top: 20px;
                        color:darkblue;
                        font-size:15px">Mã xác thực của bạn là: </p>
            <p style="text-align:center;
                        margin-top: 20px;
                        color:darkblue;
                        font-size:30px"><strong>{{$OTP}}</strong></p>
            <p style="text-align:center;
                        margin-top: 20px;
                        color:darkblue;
                        font-size:15px">Hãy sử dụng mã xác thực này để tiếp tục việc đăng ký ở website</p>
     </div>

</body>
</html>

