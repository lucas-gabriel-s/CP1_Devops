<?php
session_start();
include_once 'functions.php';

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birthdate = $_POST['birthdate'];

$purchaseValue = $_POST['purchaseValue'];
$interestRate = $_POST['interestRate'];
$numInstallments = $_POST['numInstallments'];
$initialPayment = isset($_POST['initialPayment']) ? $_POST['initialPayment'] : 0;

$CF = calculateCF($interestRate, $numInstallments);

$total1 = calculateScenario1($purchaseValue, $CF, $numInstallments);

$total2 = calculateScenario2($purchaseValue, $CF, $numInstallments, $initialPayment);

$total3 = calculateScenario3($purchaseValue, $CF, $numInstallments, $initialPayment);


$simulation = array(
    'name' => $name,
    'cpf' => $cpf,
    'email' => $email,
    'phone' => $phone,
    'birthdate' => $birthdate,
    'purchaseValue' => $purchaseValue,
    'interestRate' => $interestRate,
    'numInstallments' => $numInstallments,
    'initialPayment' => $initialPayment,
    'total1' => $total1,
    'total2' => $total2,
    'total3' => $total3
);


if (!isset($_SESSION['simulations'])) {
    $_SESSION['simulations'] = array();
}
$_SESSION['simulations'][] = $simulation;

header('Location: index.php');
?>
