<?php
include_once("../include/dbh.inc.php");
$dbh = new dbHandler;
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Project</title>
	<link rel="stylesheet" href="../include/style.css">
	<link rel="stylesheet" href="project.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="project.js"></script>
</head>


<body>
	<div class="container-fluid">
		<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
			<a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
				<img src="../../images/aevg.png" class="" height="45">
			</a>

			<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
				<li><a href="../home/home.php" class="nav-link px-2 link-dark">Home</a></li>
				<li><a href="../aboutUs/aboutUs.php" class="nav-link px-2 link-dark">About Us</a></li>
				<li><a href="#" class="nav-link px-2 link-secondary">Projects</a></li>
				<li><a href="../materials/materials.php" class="nav-link px-2 link-dark">Materials</a></li>

			</ul>

			<div class="col-md-3 text-end">

				<!-- Checking if the session is set -->
				<?php if (!isset($_SESSION['id'])) { ?>


					<a href="../register/register.php" class="btn btn-dark">Sign-up</a>
					<a href="../login/login.php" class="btn btn-outline-dark me-2">Login</a>

				<?php } else { ?>

					<div class="dropdown">

						<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							<?php echo $dbh->getFullname($_SESSION['id']); ?>
						</button>

						<ul class="dropdown-menu dropdown-menu-dark">

							<li><a class="dropdown-item active" href="../profile/profile.php">Profile</a></li>
							<li><a class="dropdown-item" href="../message/message.php">Message</a></li>
							<li><a class="dropdown-item" href="../order/order.php">Order</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="../logout/logout.php">Logout</a></li>

						</ul>
					</div>

				<?php } ?>

			</div>
		</header>
	</div>
	<div class="container">
		<h1 class="text-center">Projects</h1>
	</div>
	<div class="nav-scroller py-1 mb-2">
		<nav class="nav d-flex justify-content-center">
			<button class="p-2 link-secondary btn btn-link category">All</button>
			<button class="p-2 link-secondary btn btn-link category">Building</button>
			<button class="p-2 link-secondary btn btn-link category">Commercial</button>
			<button class="p-2 link-secondary btn btn-link category">Design</button>
			<button class="p-2 link-secondary btn btn-link category">Renovation</button>
			<button class="p-2 link-secondary btn btn-link category">Blueprints</button>
			<button class="p-2 link-secondary btn btn-link category">Residentials</button>

		</nav>

		<div class="container mt-5">

			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 " id="materials">


			</div>
			<div class="container">
				<footer class="py-3 my-4">
					<hr>
					<p class="text-center text-muted">&copy; 2017 AEVG BUILDERS</p>

				</footer>
			</div>
		</div>

</body>

</html>