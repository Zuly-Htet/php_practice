<?php
include ("vendor/autoload.php");

use Helpers\Auth; 

$auth = Auth::check();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
          body{
            background: url("img/spring2.jpg") -180px 250px, no-repeat;
            background-size: cover;
          
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-3">
            <?= $auth->name?>

            <?php if($auth->value === 1) : ?>
                <span class="fw-normal text-muted">
                    (<?= $auth->role ?>)
                </span>

            <?php elseif($auth->value === 2) : ?>
                <span class="fw-normal text-primary">
                (<?= $auth->role ?>)
                </span> 

            <?php else : ?>
                <span class="fw-normal text-success">
                (<?= $auth->role ?>)
            </span>

            <?php endif ?>
        </h1>

        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-warning">
                Cannot Upload File!
            </div>
        <?php endif ?>

        <?php if ($auth->photo) : ?>
            <img class="img-thumbnail mb-3" src="_actions/photos/<?= $auth->photo ?>" alt="Profile Photo" width="200">
        <?php endif ?>

        <form action="_actions/upload.php" method="post" enctype="multipart/form-data" >
           <div class="input-group mb-2">
           <input type="file" name="photo" class="form-control">
           <button class="btn btn-secondary">Upload</button>
           </div>
        </form>
        <ul class="list-group">
            <li class="list-group-item">
                <b>Email:</b> <?= $auth->email ?>
            </li>
            <li class="list-group-item">
                <b>Phone:</b> <?= $auth->phone ?>
            </li>
            <li class="list-group-item">
                <b>Address:</b> <?= $auth->address ?>
            </li>
        </ul>
        <br>
        <a href="admin.php" class="btn btn-info"> Manage Users </a>
        <a href="_actions/logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>

</html>