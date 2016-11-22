<?php

function formatData($Data){

$formattedString="{";

$lines = explode(" ", $Data);
for($i = 0; $i < count($lines); $i++){
$currentLine = $lines[$i];
$currentLineItems = explode(",", $currentLine);
$label = array_shift($currentLineItems);
$list = implode(',', $currentLineItems);
$insertString = '"'. $label . '":['. $list .'], ';
$formattedString .= $insertString;
}

$formattedString = $formattedString . "}";
return $formattedString;

}


function formatDataJSON($Data){

$myArray = array();


$lines = explode(" ", $Data);
for($i = 0; $i < count($lines); $i++){
$currentLine = $lines[$i];
$currentLineItems = explode(",", $currentLine);
$label = array_shift($currentLineItems);

for($j=0; $j < count($currentLineItems); $j++){
$currentLineItems[$j] = str_replace("\r", '', $currentLineItems[$j]);
}

$myArray[$label] = $currentLineItems;
}



$toJSON = json_encode($myArray, JSON_PRETTY_PRINT);
    return $toJSON;

}


function encodeToJSON($Data){

$secArray = "";
for($i = 1; $i < count($Data); $i++){
echo $Data[$i];
$secArray .= $Data[$i] . ",";
}

echo $secArray;
}

?> 