<?php
include("config.php");
session_start();

if(!empty($_POST))
{
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,($_POST['password']));
	$sql=mysqli_query($con,"select * from admin where username='$username' and password='$password'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['username']=$_POST['username'];
		header("location:viewstatus.html");
	}
	else
	{
		?>
        <script type="text/javascript">
		alert("Incorrect Admin ID or Password");
		</script>
      <?php
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>SRI KRISHNA</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            background-image: url("assest/pg.jpeg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            flex-direction: column;
        }

        .Header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2874B1;
            padding: 10px;
        }

        .logo img {
            height: 40px;
        }

        .text-center {
            color: white;
            text-align: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 30%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 40px 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2874B1;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #2874B1;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: calc(100% - 40px);
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            min-width: 250px;
            height: 50px;
        }

        .form-group input[type="password"]+.toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .form-group input[type="submit"] {
            width: 100%;
            background-color: #2874B1;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #1F5A8F;
        }

        .forgot-password {
            font-size: 14px;
            color: #2874B1;
            text-decoration: none;
            display: block;
            float: left;
            margin-right: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="Header h-20 w-full bg-blue-600 flex justify-center">
        <div class="logo ">
            <img class="h-10 mt-5 " src="assest/logo.png">
        </div>
        <div class="text-black text-center place-items-stretch pt-3 ml-5 mr-8">
            <h1 class="font-bold text-2xl text-white ">SRI KRISHNA INSTITUTIONS</h1>
        </div>
    </div>
    <div class="body h-screen flex justify-center place-content-center">
        <div >
        <div class="container" style="padding:20px">
            <h2 class="font-bold">MANAGEMENT LOGIN</h2>
            <form id="loginForm" action="#" method="post">
                <div class="form-group">
                    <label for="userid">UserName</label>
                    <input type="text" id="userid" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div style="position: relative;">
                        <input type="password" id="password" name="password" required>
                        <span class="toggle-password" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;"><i class="far fa-eye" style="font-size: 1.2rem;"></i></span>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login" name="submit">
               
                </div>
            </form>
        </div></div>
    </div>
  
</body>
</html>
