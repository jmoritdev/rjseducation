<?php 
    session_start(); 
    if( empty($_SESSION["id"]) ){
        header("Location: index.php");
    }
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<title>Basisschool De Ooievaar</title>

<link href="/Assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<link href="/Assets/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">RJSEducation</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
<!--                <li><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo($_SESSION["username"]." "); ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="logout.php">Uitloggen</a>   
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/Assets/bootstrap/js/bootstrap.min.js"></script>


<!--        <div class="container">

            <div class="starter-template">
                <br><br>
                <h1>Bootstrap starter template</h1>
                <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
            </div>
        </div>-->



