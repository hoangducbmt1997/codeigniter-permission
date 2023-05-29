<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url('assets/css/admin/login.css') ?>" crossorigin>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="https://www.google.com/recaptcha/api.js?render='<?php echo $this->config->item('recaptcha_site_key'); ?>'"></script>
</head>

<style>
#btnlogin{
	padding: 10px !important;
}
</style>
<body>
	<div class="container-fluid">

		<div class="auth-page-wrapper pt-5">
			<!-- page bg -->
			<div class="auth-one-bg-position auth-one-bg" id="auth-particles">


				<div class="bg-overlay"></div>
				<div class="shape">
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
						<path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
					</svg>
				</div>
				<canvas class="particles-js-canvas-el" width="1349" height="380" style="width: 100%; height: 100%;"></canvas>

			</div>

			<!-- page content -->
			<div class="auth-page-content">
				<div class="container">
					<div class="row justify-content-center">
						<div class=" pt-5 col-md-8 col-lg-6 col-xl-5">
							<div class="card mt-5 login-bg">
								<div class="card-body  p-5">
									<div class="text-center">
										<h3 class="text-dark mt-3">Login to GCE-WD</h3>
									</div>
									<form action="<?php echo base_url('login-user') ?>" method="POST">
										<div class="p-2 mt-3">
											<div class="mb-3">
												<label for="username" class="form-label">Username</label>
												<input name="username" type="text" id="username" class="form-control" placeholder="Enter username" />
											</div>
											<div class="error"><?php echo form_error('username'); ?></div>
											<div class="mb-3">
												<label class="form-label" for="password-input">Password</label>
												<div class="position-relative auth-pass-inputgroup mb-3">
													<input name="password" type="password" id="password" class="form-control pe-5 password-input" placeholder="Enter password" />
												</div>
											</div>
											<div class="error"><?php echo form_error('password'); ?></div>


											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="remember" value="1" id="auth-remember-check" />
												<label class="form-check-label" for="auth-remember-check">Remember me</label>
											</div>


											<div class="g-recaptcha mt-3" data-sitekey="<?php echo $this->config->item('recaptcha_site_key'); ?>"></div>


											<div class="mt-4">
												<input type="submit" name="btnlogin" value="Login" id="btnlogin" class="btn fw-bold btn-primary w-100" />
											</div>
											<?php if (!empty($this->session->flashdata('error'))) : ?>
												<div class="alert alert-danger mgs-login-error mt-3">
													<?php echo $this->session->flashdata('error'); ?>
												</div>
											<?php endif; ?>
										</div>
									</form>
								</div>
								<!-- card body -->
							</div>

							<!-- card -->
						</div>
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- end page content -->
		</div>
	</div>


</body>
