<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_NAME ?></title>
		<meta charset="utf-8">
		<meta content="IE=edge" http-equiv=X-UA-Compatible>
		<meta content="width=device-width,initial-scale=1" name=viewport>
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="icon" href="/img/favicon.png">
	</head>
	<body>
		<nav class="navbar navbar-inverse">
		    <div class="container-fluid">
		        <div class="navbar-header">
		            <a class="navbar-brand" href="/"><img class="img-responsive img-circle" src="/img/favicon.png" width="20" height="20"></a>
		            <a class="navbar-brand" href="/">
                        Hello
                        <?php if (\Core\Auth::checkIfAuth()) { ?>
                            <?= \Core\Auth::getUserName() ?>
                        <?php } ?>
                    </a>
		        </div>
		        <ul class="nav navbar-nav">
		            <li><a href="/">Home</a></li>
                    <?php if (\Core\Auth::checkIfAuth()) { ?>
                        <li><a href="/user">Users</a></li>
                        <li><a href="/auth/logout">Logout</a></li>
                    <?php } else { ?>
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    <?php } ?>
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
        <?php if (\Core\Auth::checkIfAuth()) { ?>
            <script src="/js/custom.js"></script>
        <?php } ?>
	</body>
</html>