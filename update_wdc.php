<?php
session_start();

// Protect page from unauthorized access
require('includes/auth_check.php');

// Declare page title
$page_title = "Update WDC Standings - F1 Tracker";

// Call header and navigation files
include('includes/header.php');
include('includes/nav.php');

// Retrieve any old input or errors from the session (set by process_wdc.php)
$errors = $_SESSION['wdc_errors'] ?? [];
$old    = $_SESSION['wdc_old'] ?? [];

// Clear the session variables so errors don't persist on page refresh
unset($_SESSION['wdc_errors'], $_SESSION['wdc_old']);
?>

<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-md-2 col-lg-3"></div>
        <div class="col-md-8 col-lg-6">
            <h2 class="pb-3 text-center">Update Championship Standings</h2>
            
            <!-- Display Validation Errors -->
            <?php if ($errors): ?>
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <!-- Form posts to the backend processor -->
                    <form action="process_wdc.php" method="POST">
                        
                        <div class="mb-3">
                            <label for="championship_position" class="form-label">Championship Position</label>
                            <input type="number" class="form-control" id="championship_position" name="championship_position" 
                                   value="<?php echo htmlspecialchars($old['championship_position'] ?? ''); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Driver Name</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   placeholder="e.g., Oscar Piastri"
                                   value="<?php echo htmlspecialchars($old['name'] ?? ''); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="team" class="form-label">Team</label>
                            <input type="text" class="form-control" id="team" name="team" 
                                   placeholder="e.g., mclaren racing"
                                   value="<?php echo htmlspecialchars($old['team'] ?? ''); ?>" required>
                        </div>

                        <div class="mb-4">
                            <label for="points" class="form-label">Total Points</label>
                            <!-- step="any" allows for decimal points, as F1 occasionally awards half-points -->
                            <input type="number" step="any" class="form-control" id="points" name="points" 
                                   value="<?php echo htmlspecialchars($old['points'] ?? ''); ?>" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger btn-lg">Update Standings</button>
                            <a href="control_panel.php" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
        <div class="col-md-2 col-lg-3"></div>
    </div>
</div>

<?php
// Call footer
include('includes/footer.php');
?>