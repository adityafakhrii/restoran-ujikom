<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Restoran</title>
    <style>
        body{
            font-family: sans-serif;
        }
        .login-box{
            padding: 40px 30px 40px 30px;
            position: absolute;
            transform: translate(-50%,-50%);
            left: 50%;
            top: 30%;
            box-shadow: 8px 7px 25px #ccc;
            border-radius: 4%;
        }
        .input{
            padding: 10px;
        }
        select{
            cursor: pointer;
            width: 100%;
        }
        .mgtop{
            margin-top: 20px;
        }

        .btn{
            padding: 10px 20px;
            cursor: pointer;
            border: none;
        }
        .btn-grey{
            background-color: #ccc;
            transition: 0.4s;
            color: #555;
        }
        .btn-grey:hover{
            background-color: #777;
            color: #ccc;
        }
        .title{
            text-align: center;

        }
        .title-login{
            font-size: 20px;
        }




    </style>
</head>
<body>
    <div class="login-box">
        <div class="title">
            <h2 class="title-login">Login | Backend</h2>
        </div>
        <form action="/postbackend" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Masukkan email anda..." required class="input"><br><br>
            
            <input type="password" name="password" placeholder="password" class="input">
            <br><br>
            <button class="btn btn-grey">Submit</button>
            
        </form>
        @if(Session::has('fail'))
            <h1>Login Gagal</h1>
        @endif
    </div>
</body>
</html>

            <!-- <center><button type="submit" class="btn mgtop btn-grey">Masuk</button></center> -->
