<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>KOPPEE</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="Free Website Template" name="keywords">
	<meta content="Free Website Template" name="description">

	<!-- Favicon -->
<!--	<link href="--><?//=$conf['web_url']?><!--/img/favicon.ico" rel="icon">-->

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

	<!-- Customized Bootstrap Stylesheet -->
	<link href="assets/css/style.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar Start -->
<div class="container-fluid p-0 nav-bar">
    <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
        <a href="/" class="navbar-brand px-lg-4 m-0">
            <h1 class="m-0 display-4 text-uppercase text-white">KOPPEE</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto p-4">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="menu.html" class="nav-item nav-link">Menu</a>
                <a href="reservation.html" class="nav-item nav-link">Reservation</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>

	<? if (!empty($data['error'])) { ?>
        <div class="alert alert-danger" role="alert">
			<?= showArray($data['error']) ?>

        </div>
		<?
	} ?>
	<?
	if (!empty($data['success'])) { ?>
        <div class="alert alert-success" role="alert">
			<?= showArray($data['success']) ?>
        </div>
		<?
	} ?>
</div>
<!-- Navbar End -->


<?= $data['body']; ?>



<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="assets/lib/easing/easing.min.js"></script>
<script src="assets/lib/waypoints/waypoints.min.js"></script>
<script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="assets/lib/tempusdominus/js/moment.min.js"></script>
<script src="assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Contact Javascript File -->
<!--<script src="mail/jqBootstrapValidation.min.js"></script>-->
<!--<script src="mail/contact.js"></script>-->

<!-- Template Javascript -->
<script src="assets/js/main.js"></script>
</body>

</html>
