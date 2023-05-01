<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$table = new UsersTable(new MySQL());
$all = $table->getAll();

$auth = Auth::check();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            background-color: lightblue;
        }

    </style>
</head>

<body>
    <div class="container">
        <div style="float: right">
            <a href="profile.php">Profile</a> |
            <a href="_actions/logout.php" class="text-danger">Logout</a>
        </div>
        <h1 class="mt-5 mb-5">
            Manage Users
            <span class="badge bg-danger text-white">
                <?= count($all) ?>
            </span>
        </h1>
        <table class="table table-dark table-striped table-bordered">
            <tr>
                <th style="color:lightblue">ID</th>
                <th style="color:lightblue">Name</th>
                <th style="color:lightblue">Email</th>
                <th style="color:lightblue">Phone</th>
                <th style="color:lightblue">Role</th>
                <th style="color:lightblue">Actions</th>
            </tr>
            <?php foreach ($all as $user) : ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td>
                        <?php if($user->value === 2 ):?>
                            <span class="text-primary">  <?= $user->name ?> </span>
                        <?php elseif($user->value === 3 ):?>
                            <span class="text-success">  <?= $user->name ?> </span>
                        <?php elseif($user->suspended):?>
                            <span class="text-danger">  <?= $user->name ?> </span>
                        <?php else : ?>
                            <span class="text-white"> <?= $user->name ?> </span> 
                        <?php endif ?>  
                    </td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phone ?></td>
                    <td>
                        <?php if($user->suspended) : ?>
                            <span class="badge bg-danger">
                                <?= $user->role ?>
                            </span>
                        
                       
                        <?php elseif($user->value === 1 ) : ?>
                            <span class="badge bg-secondary">
                                <?= $user->role ?>
                            </span>

                        <?php elseif($user->value === 2) : ?>
                            <span class="badge bg-primary">
                                <?= $user->role ?>
                            </span>

                        <?php else : ?>
                            <span class="badge bg-success">
                                <?= $user->role ?>
                            </span>
                        <?php endif ?>

                        
                    </td>
                    <td>
                       
                        <div class="btn-group dropdown">
                            <?php if ($auth->value > 1 ) : ?>
                                <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">
                                    Change Role
                                </a>
                                <div class="dropdown-menu dropdown-menu-dark">
                                    <a href="_actions/role.php?id=<?= $user->id ?>&role=1" class="dropdown-item">User</a>
                                    <a href="_actions/role.php?id=<?= $user->id ?>&role=2" class="dropdown-item">Manager</a>
                                    <a href="_actions/role.php?id=<?= $user->id ?>&role=3" class="dropdown-item">Admin</a>
                                </div>
                                <?php else : ?>
                            ###
                       
                            <?php endif ?>    
                          

                            <?php if ($auth->value >= 2) : ?>
                                <?php if ($user->suspended) : ?>
                                    <a href="_actions/unsuspend.php?id=<?= $user->id ?>" class="btn btn-warning btn-sm">Unban</a>
                                <?php else : ?>
                                    <a href="_actions/suspend.php?id=<?= $user->id ?>" class="btn btn-outline-warning btn-sm">Ban</a>
                                <?php endif ?>
                            <?php endif ?>

                        <?php if ($auth->value>=3) : ?>
                            <a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-danger" onClick="return confirm('Are you sure?')">Delete</a>

                        <?php endif ?>

                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
   
   
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>