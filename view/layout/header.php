<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload</title>

    <link rel="stylesheet" href="/css/app.css">
    <style>
        p{padding:10px;}
    </style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Upload</a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                <?php if(isset($_SESSION['username'])) { if($_SESSION['username'] == 'admin'){ ?>
                    <li><a href="/index.php?sort=name">by name</a></li>
                    <li><a href="/index.php?sort=email">by email</a></li>
                    <li><a href="/index.php?sort=checked">by checked</a></li>
                    <li><a href="/index.php?sort=id">by ID</a></li>
                <?php }} else { ?>
                    <li><a href="/index.php/login">Login</a></li>
                <?php } ?>
                </ul>
			</div>
		</div>
	</nav>