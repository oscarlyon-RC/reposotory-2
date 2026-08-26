<?php
session_start();
require('includes/auth_check.php');
require('includes/conn_1dt.php');


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: submit_race_results.php');
    exit;
}


$race_number  = trim($_POST['race_number'] ?? '');
$race_name    = trim($_POST['race_name'] ?? '');
$winner       = trim($_POST['winner'] ?? '');
$second       = trim($_POST['second'] ?? '');
$third        = trim($_POST['third'] ?? '');
$errors                    = [];

if ($race_number === '') {
    $errors[] = 'Please enter the races number';
}
if ($race_name === '') {
    $errors[] = 'Please enter the name of the race';
}
if ($winner === '') {
    $errors[] = 'please enter a winner of the race';
}
if ($second === '') {
    $errors[] = 'Please enter the second place driver';
}
if ($third === '') {
    $errors[] = 'Please enter the third place driver';
}




$sql = "INSERT INTO race_results (race_number, race_name, winner, second, third)
        VALUES (:race_number, :race_name, :winner, :second, :third)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':race_number'  => $race_number,
    ':race_name'    => $race_name,
    ':winner'       => $winner,
    ':second'       => $second,
    ':third'        => $third,
]);

header('Location: race_results.php?logged=1');
exit;