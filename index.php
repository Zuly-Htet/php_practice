<?php

// include ('vendor/autoload.php');

// use Carbon\Carbon;
// use App\Library\Math;

// echo Carbon::now()->addDay();
// echo Math::add(1, 3);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>

        body{
            background: url("img/spring2.jpg") -180px 250px, no-repeat;
            background-size: cover;
          
        }
        .wrap {
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
           
        }
    </style>
</head>

<body class="text-center">
    <div class="wrap">
        <h1 class="h3 mb-3">Login</h1>
        <?php if (isset($_GET['incorrect'])) : ?>
            <div class="alert alert-warning">
                Incorrect Email or Password...
            </div>
        <?php endif ?>

        <?php if (isset($_GET['register'])) : ?>
            <div class="alert alert-success">
               Account created! Please log in...
            </div>
        <?php endif ?>

        <?php if (isset($_GET['suspended'])) : ?>
            <div class="alert alert-danger">
                Your account is suspended...
            </div>
        <?php endif ?>
        <form action="_actions/login.php" method="post" class="shadow-lg">
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <button type="submit" class="w-100 btn btn-lg btn-primary">
                Login
            </button>
        </form>
        <br>
        <a href="register.php">Register</a>
    </div>
</body>

</html>