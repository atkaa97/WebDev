<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta content="IE=edge" http-equiv=X-UA-Compatible>
		<meta content="width=device-width,initial-scale=1" name=viewport>
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
	</head>
	<body>
		<nav class="navbar navbar-inverse">
		    <div class="container-fluid">
		        <div class="navbar-header">
		            <a class="navbar-brand" href="/"><img class="img-responsive" src="/img/logo.png" width="20" height="20"></a>
		            <a class="navbar-brand" href="/">My Website</a>
		        </div>
		        <ul class="nav navbar-nav">
		            <li><a href="/">Home</a></li>
		            <li><a href="/user">Users</a></li>
		        </ul>
		    </div>
		</nav>
		<div id="main" class="container">
			@content
		</div>
		<footer class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="text-center">
						2018 &copy; All Rights Reserved
					</div>
				</div>
			</div>
		</footer>
		<script src="/js/jquery-3.3.1.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
	</body>
</html>