<?php

function format_fullname($firstname, $lastname) {
    return $lastname . ', ' . $firstname;
}
function format_fullnameV2($fname, $mname, $lname,$suffix,$is_reversed,$is_capital){
$fullname="";
if($is_reversed ==1){
    $fullname = $lname . ', ' . $fname. ' ' . $mname. ', ' . $suffix;
}else{
    $fullname = $fname . ' ' . $mname. ' ' . $lname. ', ' . $suffix;
}
if($is_capital ==1){
    $fullname = strtoupper($fullname);
}
return $fullname;
}

function format_report_date($d, $formatType){
    $timestamp = strtotime($d);
    if(!$timestamp){
        return 'Invalid;';
    }

    switch($formatType){
    case 1:
    return date('l, F d, Y', $timestamp);
    case 2:
    return date('d F Y - l', $timestamp);
    case 3:
    return 'Today is '.date('l, F d, Y', $timestamp);
    default:
    return 'Invalid format ';
    }
}

function gradeRemarks($grade){
    $remarks = '';
if( $grade >= 90){
    $remarks = 'Excellent';
}elseif($grade >= 80 && $grade < 90){
$remarks = 'Very good';
}
elseif($grade >= 75 && $grade < 80){
$remarks = 'Good';
}else{
$remarks = 'failed';
}
return $remarks;
}

function greet($time){
    $greetings = '';

    if($time >= '05:00:00' && $time <='11:59:59'){
        $greetings ='Good morning';

    }elseif($time >= '12:00:00' && $time <='17:59:59'){
        $greetings ='Good afternoon';

    }else{
        $greetings ='Good evening';

    }
    return $greetings;

}
?>
