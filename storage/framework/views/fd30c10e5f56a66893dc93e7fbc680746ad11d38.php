<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Login - Employee Databank</title>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="css/style.css">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="account-page">

		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				
				<div class="container">

					<!-- Account Logo -->
					<div class="account-logo">
						<a href=""><img src="img/logo.png" alt="Employee Databank"></a>
					</div>
					<!-- /Account Logo -->

					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Login</h3>
							<p class="account-subtitle">Access to our dashboard</p>

							<!-- Account Form -->
							<form action="javascript:void(0)">
								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" type="text" id="email">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>Password</label>
										</div>
										<div class="col-auto">
											<a class="text-muted" href="forgot-password.html">
												Forgot password?
											</a>
										</div>
									</div>
									<input class="form-control" type="password" id="password">
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit" onclick="authenticate()">Login</button>
								</div>
								<div class="account-footer">
									<p>Don't have an account yet? <a href="register">Register</a></p>
								</div>
							</form>
							<!-- /Account Form -->

						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="js/jquery-3.2.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

		<!-- Custom JS -->
		<script src="js/app.js"></script>


		<script>
			function authenticate()
			{
				let data = {
					email:email.value,
					password:password.value
				}
				axios.post(`<?php echo e(route('authenticate')); ?>`, data).then(res => {
					if(res.data.status == 1)
					{
						window.location.href = res.data.url;
					}
					else
					{
						alert('Incorrect email or password');
					}
				});
			}
		</script>

    </body>
</html>
<?php /**PATH C:\Users\avenson\Desktop\databank\resources\views/login.blade.php ENDPATH**/ ?>