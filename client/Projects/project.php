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
							<li><a class="dropdown-item" href="../../logout/logout.php">Logout</a></li>

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
			<a class="p-2 link-secondary" href="#">All</a>
			<a class="p-2 link-secondary" href="#">Building</a>
			<a class="p-2 link-secondary" href="#">Commercial</a>
			<a class="p-2 link-secondary" href="#">Design</a>
			<a class="p-2 link-secondary" href="#">Renovation</a>
			<a class="p-2 link-secondary" href="#">Blueprints</a>
			<a class="p-2 link-secondary" href="#">Residentials</a>

		</nav>
		<div class="album py-5 bg-light">
			<div class="container">

				<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 " id="materials">
					<div class="col">
						<div class="card">

							<div id="carouselExampleInterval" class="carousel slide">
								<div class="carousel-inner">
									<div class="carousel-item active">
									<img src="../../images/budget.jpg" class="d-block w-70 img-fluid img ">
									</div>
									<div class="carousel-item">
									<img src="../../images/construction.jpg" class="d-block w-70 img-fluid img">
									</div>
									<div class="carousel-item">
										<img src="../../images/cement.jpg" class="d-block w-70 img-fluid img">
									</div>
								</div>
								<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>
								<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>
							</div>
							<div class="card-body">
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div>

				</div>
				<div class="container">
					<footer class="py-3 my-4">
						<ul class="nav justify-content-center border-bottom pb-3 mb-3">

						</ul>
						<p class="text-center text-muted">&copy; 2017 AEVG BUILDERS</p>

					</footer>
				</div>

</body>

</html>