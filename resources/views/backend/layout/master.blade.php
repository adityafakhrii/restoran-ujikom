<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Master</title>
	<style>
		ul{
			display: inline;
		}
		li{
			display: inline-block;
			margin-left: 15px;
			margin-top: 15px;
		}
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
	<ul>
		<li><a href="/dashboard">Dashboard</a></li>
		<li><a href="/daftarmenu-admin">Daftar Menu</a></li>
        <li><a href="/waiter">Daftar Waiter</a></li>
        <li><a href="/kasir">Daftar Kasir</a></li>
        <li><a href="/tambah-karyawan">Tambah Karyawan</a></li>
		<li><a href="/logout">Logout</a></li>
	</ul>
	@yield('content')
</body>
</html>