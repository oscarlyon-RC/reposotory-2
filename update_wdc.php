<?php
session_start();
require('includes/auth_check.php');
require('includes/conn_1dt.php');



$championship_position     = trim($_POST['championship position'] ?? '');
$name = trim($_POST['driver name'] ?? '');
$team     = $_POST['drivers team'] ?? '';
$points    = trim($_POST['drivers points'] ?? '');
$errors   = [];

if ($championship_position === '') {
    $errors[] = 'Please enter a championship position.';
}
if ($name === '') {
    $errors[] = 'Please enter a drivers name';
}
if ($team === '') {
    $errors[] = 'please enter a drivers team';
}
if (points === '') {
    $errors[] = 'Please enter a drivers points';
}




$sql = "INSERT INTO wdc (championship_position, name, team, points)
        VALUES (:championship position, :name, :team, :points)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':championship position' => $championship_position,
    ':name'                  => $name,
    ':team'                  => $team,
    ':points'                => $points,
]);

header('Location: manage_loans.php?logged=1');
exit;