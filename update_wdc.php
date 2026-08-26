<?php
session_start();
require('includes/auth_check.php');
require('includes/conn_1dt.php');


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: submit_wdc.php');
    exit;
}


$championship_position = trim($_POST['championship_position'] ?? '');
$name                  = trim($_POST['name'] ?? '');
$team                  = trim($_POST['team'] ?? '');
$points                = trim($_POST['points'] ?? '');
$errors                    = [];

if ($championship_position === '') {
    $errors[] = 'Please enter a valid position';
}
if ($name === '') {
    $errors[] = 'Please enter a drivers name';
}
if ($team === '') {
    $errors[] = 'please enter a drivers team';
}
if ($points === '') {
    $errors[] = 'Please enter a valid amount of points';
}




$sql = "INSERT INTO wdc (championship_position, name, team, points)
        VALUES (:championship_position, :name, :team, :points)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':championship_position'  => $championship_position,
    ':name'                   => $name,
    ':team'                   => $team,
    ':points'                 => $points,
]);

header('Location: WDC.php?logged=1');
exit;