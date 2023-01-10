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
				<img src="../../images/aevg.png" class="img-logo" height="45">
			</a>

			<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
				<li><a href="../home/home.php" class="nav-link px-2 link-dark">Home</a></li>
				<li><a href="../aboutUs/aboutUs.php" class="nav-link px-2 link-dark">About Us</a></li>
				<li><a href="../projects/project.php" class="nav-link px-2 link-secondary">Projects</a></li>
				<!-- <li><a href="../materials/materials.php" class="nav-link px-2 link-dark">Materials</a></li> -->
				<?php if (isset($_SESSION['id']) && !$dbh->getSched($_SESSION['id']) >= '1') { ?>
					<li><a href="../contactUs/contactUs.php" class="nav-link px-2 link-dark">Appointment</a></li>
				<?php } elseif (isset($_SESSION['id']) && $dbh->getSched($_SESSION['id'])[0]->status == "Finished") { ?>
					<li><a href="../contactUs/contactUs.php" class="nav-link px-2 link-dark">Appointment</a></li>
				<?php } ?>
			</ul>

			<div class="col-md-3 text-end">

				<!-- Checking if the session is set -->
				<?php if (!isset($_SESSION['id'])) { ?>


					<a href="../register/register.php" class="btn btn-dark">Sign-up</a>
					<a href="../../index.php" class="btn btn-outline-dark me-2">Login</a>

				<?php } else { ?>

					<div class="d-flex flex-row-reverse">

						<div class="dropdown me-5">
							<a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="../profile/<?php echo $dbh->getValueByID('image', $_SESSION['id']); ?>" alt="" width="32" height="32" class="rounded-circle me-2">
								<strong class="text-capitalize"><?php echo $dbh->getFullname($_SESSION['id']); ?></strong>
							</a>
							<ul class="dropdown-menu text-small shadow">
								<li><a class="dropdown-item active" href="../profile/profile.php">Profile</a></li>
								<li><a class="dropdown-item" href="../../logout/logout.php">Logout</a></li>
							</ul>
						</div>
						<?php if (!$dbh->getSched($_SESSION['id']) >= '1') { ?>
							<div>

							</div>
						<?php } ?>
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
			<button class="p-2 link-secondary btn btn-link category">Residentials</button>
			<button class="p-2 link-secondary btn btn-link category">Commercial</button>
			<button class="p-2 link-secondary btn btn-link category">Mixed-Use</button>
			<button class="p-2 link-secondary btn btn-link category">Institutional</button>
			<button class="p-2 link-secondary btn btn-link category">Industrial</button>
			<button class="p-2 link-secondary btn btn-link category">Interior</button>
			<button class="p-2 link-secondary btn btn-link category">Renovation</button>


		</nav>


		<div class="container mt-5">

			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="materials">


			</div>
			<div class="container">
				<footer class="py-3 my-4">
					<hr>
					<p class="text-center text-muted">&copy; 2020 AEVG BUILDERS</p>

				</footer>
			</div>
		</div>
	</div>

	<!-- MODAL PROJECTS -->
	<div class="modal fade" id="openModalProj" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content rounded-4 shadow">
				<div class="modal-body p-5" id="projectModalBody">
					<img class="img-fluid" src="../../images/consultation.jpg">


					<div class="d-flex justify-content-between w-100 mt-3">
						<h2 class="fw-normal">Title </h2>
						<div>
							<i class=" fas fa-heart react"></i> <span>4</span>
						</div>

					</div>
					<p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum unde porro suscipit amet eos quae consectetur, beatae incidunt, assumenda, quas cupiditate alias. Inventore dignissimos quo illo? Aliquam maiores ea fugit.
						Id ducimus, harum assumenda aperiam sapiente aut pariatur cupiditate, quis excepturi blanditiis non nostrum beatae nulla saepe cum illum atque? Neque aspernatur placeat veritatis cum odio quam ducimus consectetur reprehenderit.</p>
				</div>
			</div>
		</div>
	</div>


</body>

</html>
