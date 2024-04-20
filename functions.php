<?php

function calculateCF($interestRate, $numInstallments) {
    return ($interestRate * pow((1 + $interestRate), $numInstallments)) / (pow((1 + $interestRate), $numInstallments) - 1);
}

function calculateScenario1($purchaseValue, $CF, $numInstallments) {
    $PMT = $purchaseValue * $CF;
    return $PMT * $numInstallments;
}

function calculateScenario2($purchaseValue, $CF, $numInstallments, $initialPayment) {
    $PV = $purchaseValue - $initialPayment;
    $PMT = $PV * $CF; 
    return $initialPayment + ($PMT * $numInstallments); 
}
function calculateScenario3($purchaseValue, $CF, $numInstallments) {
    $PMT = ($purchaseValue * $CF) / (1 + $CF); // 
    return $PMT * $numInstallments; 
}
?>
