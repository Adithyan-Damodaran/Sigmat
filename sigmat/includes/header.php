
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sigmat</title>
	 <!-- jQuery UI CSS -->
        <link href="vendor/jquery/jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		<style>
			.container
			{
				padding-top:100px;
			}
		</style>
</head>

<body>
<div class="container-fluid">
	
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">SIGMAT</a>
				</div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="index.php#about">About Us</a></li>
						<li><a href="index.php#contact">Contact</a></li>
						<li><a href="products.php">Products</a></li>
					</ul>
					<form class="navbar-form navbar-right" meatho="GET" action="search.php">
						<div class="form-group">
						<input type="text" class="form-control" name="model"  placeholder="Enter Model">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
    </form>	
			</div>
			
		</nav>
	</div		>
  <div class="container">