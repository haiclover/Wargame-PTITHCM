<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login L.A.T</title>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/nav.css">
    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <style>
        html,body
        {
            background: url("<?php echo base_url(); ?>img/polygon-cat-2.jpg");
        }
    </style>
</head>
<body>
    
<ul class="navbar">
    <li><a class="" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo.png" style="width: 158px;" alt=""></a></li>
    <li><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>icon/home.svg" alt="" width="36px" ></a></li>
    <li><a href="<?php echo base_url(); ?>ranking"><img src="<?php echo base_url(); ?>icon/rank.svg" alt="" width="36px"></a></li>
    <li><a href="<?php echo base_url(); ?>login"><img src="<?php echo base_url(); ?>icon/sign-in.svg" alt="" width="36px"></a></li>
</ul>
    <div class="container mt-5" style="margin-top: 1rem!important;">
        <div class="row justify-content-center">
            <div class="col-6">
                
                <div class="card mt-2">

                    <div class="card-body mt-2">
                        <form action="<?php echo base_url() ?>Admin/Login" method="POST">
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
                            Username:<input type="text" name="username" value="" placeholder="Nhập username hoặc email..." class="form-control">
                            Password: <input type="password" name="password" value="" placeholder="Nhập password..." class="form-control">
                            <input type="submit" name="login" value="Đăng nhập" class="btn btn-secondary">
                        </form>
                    </div>
               
                </div>

                
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

