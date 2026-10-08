<?php

$error = "";
$showBill = false;

//what user type in each box
$units = "";
$units2 = "";
$units3 = "";
$units4 = "";
$units5 = "";

if(isset($_POST['calculate'])){
    //get data from form user answered
    $units = $_POST['units'];
    $units2 = $_POST['units2'];
    $units3 = $_POST['units3'];
    $units4 = $_POST['units4'];
    $units5 = $_POST['units5'];

    //if the box is empty then the value is zero
    if ($units == ""){
        $units = 0;
    }

    if ($units2 == ""){
        $units2 = 0;
    }

    if ($units3 == ""){
        $units3 = 0;
    }

    if ($units4 == ""){
        $units4 = 0;
    }

    if ($units5 == ""){
        $units5 = 0;
    }

    //validation
    //make sure it is a nmeric number
    if(!is_numeric($units) || !is_numeric($units2) || !is_numeric($units3) || !is_numeric($units4) || !is_numeric($units5)){
        $error = "Please enter number only!";
    }
    elseif(
        $units < 0 ||
        $units2 < 0 ||
        $units3 < 0 ||
        $units4 < 0 ||
        $units5 < 0
    ){
        $error = "kWh cannot be a negative number";
    }

    elseif(
        $units > 200
    ){
        $error = "The first unit cannot be over 200";
    }
    elseif(
        $units2 > 100
    ){
        $error = "The second unit cannot be over 100";
    }
    elseif(
        $units3 > 300
    ){
        $error = "The third unit cannot be over 300";
    }
    elseif(
        $units4 > 300
    ){
        $error = "The fourth unit cannot be over 300";
    }
    elseif($units + $units2 + $units3 + $units4 + $units5 == 0){
        $error = "Enter your electricity usage.";
    }else{
    //claculation
    $charge1 = $units * 0.218;
    $charge2 = $units2 * 0.344;
    $charge3 = $units3 * 0.516;
    $charge4 = $units4 * 0.546;
    $charge5 = $units5 * 0.571;
    
    $totalkWh = $units + $units2 + $units3 + $units4 + $units5;
    $totalCharge = $charge1 + $charge2 + $charge3 + $charge4 + $charge5;

    //minimum SST
    if($totalkWh > 700){
        $sst = $totalCharge * 0.06;
    } else {
        $sst = 0;
    }

    $totalBill = $totalCharge + $sst;

    $showBill = true;
    } 
}
?>