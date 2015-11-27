<html>
    <head>
        <meta charset="UTF-8">        
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/easyui/themes/metro/metro-blue/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/easyui/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/easyui/demo.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/easyui/themes/color.css">        

        <script type="text/javascript" src="<?php echo base_url() ?>assets/easyui/jquery.easyui.min.js"></script>
        <title></title>
        <style>
            .hideelement{
                display: none;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" id="div-navbar">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" aria-expanded="false" aria-controls="navbar" type="button" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">CAM-NGOserch Admin</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url() ?>index.php/home">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/category">Category</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/ngo">NGO</a></li>                       
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown">About<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Contact</a></li>                
                                <li><a href="#">About us</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/home/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>               
                </div>
            </div>
        </nav>
        <div style="height: 60px"></div>