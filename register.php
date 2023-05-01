<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>

body{
            background: url("img/spring1.jpg") -180px 250px, no-repeat;
            background-size: cover;
          
        }
        .wrap{
            width:100%;
            max-width:400px;
            margin: 40px auto;

        }
    </style>
</head>
<body class="text-center">
    <div class="wrap">
        <h1 class="h3 mb-3">Register</h1>

        <?php if(isset($_GET['error'])):?>
            <div class="alert alert-warning">
                Cannot create account! Please try again!
            </div>
        <?php endif ?>

        <form action = "_actions/create.php" method="post" class="shadow-lg">
            <input type="text" name="name" placeholder="Name" class= "form-control mb-2 "required>
            <input type="email" name="email" placeholder="Email" class= "form-control mb-2 "required>
            <input type="text" name="phone" placeholder="Phone" class= "form-control mb-2 "required>
            <textarea type="text" name="address" placeholder="Address" class= "form-control mb-2 "required></textarea>
            <input type="password" name="password" placeholder="Password" class= "form-control mb-2 "required>

            <button class="btn btn-primary w-100" type="submit">Register</button>

        </form>
    </div>
</body>
</html>