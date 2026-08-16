<?php
session_start();
// Declare variable
$page_title = "Gear Out | Home";
// Call files
include('includes/header.php');
include('includes/nav.php');
?>
<!-- Start of content 1 -->
<div class="container text-center pt-5">
    <div class="row align-items-start">
        <div class="col">
            <h1>The #1 F1 result tracker</h1>
            <p class="lead">keep up to date with all the most recent results in the f1 world</p>
        </div>
    </div>
</div>
<!-- Start of cards -->
<div class="container pt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column">
                    <i class="fa-solid fa-circle-info fa-3x mb-3"></i>
                    <h5 class="card-title">recent races</h5>
                    <p class="card-text">see what happened is recent races, up to date</p>
                    <a class="mt-auto" href="race_results.php"><button type="button" class="btn btn-danger btn-lg">view race results</button></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column">
                    <i class="fa-solid fa-list-check fa-3x mb-3"></i>
                    <h5 class="card-title">Championship standings</h5>
                    <p class="card-text">See who is ahead in the World Drivers championship</p>
                    <a class="mt-auto" href="WDC.php"><button type="button" class="btn btn-danger btn-lg">View now</button></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column">
                    <i class="fa-solid fa-user-shield fa-3x mb-3"></i>
                    <h5 class="card-title"><?php echo isset($_SESSION['id']) ? 'Control panel' : 'admin login'; ?></h5>
                    <p class="card-text">Log in as an administratior to update the results</p>
                    <a class="mt-auto" href="<?php echo isset($_SESSION['id']) ? 'control_panel.php' : 'login.php'; ?>">
                        <button type="button" class="btn btn-danger btn-lg"><?php echo isset($_SESSION['id']) ? 'Open' : 'Log in'; ?></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Call footer
include('includes/footer.php');
?>
