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
            <h2 class="pt-5">update recent races</h2>

            <?php if ($errors): ?>
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <form action="update_race_results.php" method="POST">
                <div class="mb-3">
                    <label for="race_number" class="form-label">race number</label>
                    <input type="text" class="form-control" id="race_number" name="race_number"
                           value="<?= htmlspecialchars($old['race_number'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="race_name" class="form-label">race name</label>
                    <input type="text" class="form-control" id="race_name" name="race_name"
                           value="<?= htmlspecialchars($old['race_name'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="winner" class="form-label">winner</label>
                    <input type="text" class="form-control" id="winner" name="winner"
                           value="<?= htmlspecialchars($old['winner'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="second" class="form-label">second</label>
                    <input type="text" class="form-control" id="second" name="second"
                           value="<?= htmlspecialchars($old['second'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="third" class="form-label">third</label>
                    <input type="text" class="form-control" id="third" name="third"
                           value="<?= htmlspecialchars($old['third'] ?? '') ?>">
                </div>


                <button type="submit" class="btn btn-primary">upadte races</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
<?php include('includes/footer.php'); ?>