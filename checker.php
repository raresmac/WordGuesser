<?php
session_start();

$result = array();
$word = str_split($_SESSION['word']);
$choice = str_split($_SESSION['choice']);
for($i = 0; $i < $_SESSION['letters']; $i++){
    if($word[$i] == $choice[$i]){
        $result[$i] = 2;
    }
    else $result[$i] = 0;
}

for($i = 0; $i < $_SESSION['letters']; $i++){
    if($result[$i] != 2){
        for($j = 0; $j < $_SESSION['letters']; $j++){
            if($i == $j) continue;
            if($choice[$i] == $word[$j] && $result[$j] != 2){
                $result[$i] = 1;
                break;
            }
        }
    }
}
?>