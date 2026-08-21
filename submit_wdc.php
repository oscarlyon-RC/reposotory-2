<?php
session_start();
require('includes/auth_check.php');

$page_title = "update information";

// If save_loan.php redirected back here with errors, read them once.
$errors = $_SESSION['borrow_errors'] ?? [];
$old    = $_SESSION['borrow_old'] ?? [];
unset($_SESSION['borrow_errors'], $_SESSION['borrow_old']);

include('includes/header.php');
include('includes/nav.php');
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h2 class="pt-5">wdc update</h2>

            <?php if ($errors): ?>
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <form action="update_wdc.php" method="POST">
                <div class="mb-3">
                    <label for="championship_position" class="form-label">championship position</label>
                    <input type="text" class="form-control" id="championship_position" name="championship_position"
                           value="<?= htmlspecialchars($old['championship_position'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="<?= htmlspecialchars($old['name'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="<?= htmlspecialchars($old['name'] ?? '') ?>">
                </div>








                <button type="submit" class="btn btn-primary">Log loan</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
<?php include('includes/footer.php'); ?>