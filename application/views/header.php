<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>L.A.T WarGame</title>
    <link rel="icon" href="http://wargame.lat.com.vn/lat.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="http://wargame.lat.com.vn/lat.ico" type="image/x-icon">
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
            background: url("<?php echo base_url(); ?>img/black2.jpg");
            background-size: cover;
            overflow-x: hidden;
        }
        a{
            color:black;
            text-decoration: none;
        }
        a:hover
        {
            color:#880000;
            text-decoration: none;
        }
        .square-box {
            position: relative;
            width: 19%;
            overflow: hidden;
            background: white;
        }
        .square-box:before {
            content: "";
            display: block;
            padding-top: 100%;
        }

        .square-content {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            color: white;
        }
        .square-content div {
            display: table;
            width: 100%;
            height: 100%;
        }
        .square-content a {
            display: table-cell;
            text-align: center;
            vertical-align: middle;
            color: white;
            font-size:30px;
        }

    </style>
</head>
<body>