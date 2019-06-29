<?php
$bil = 5956560159466056;
$pecah = explode(0, $bil);
for($i=0; $i<count($pecah); $i++){
    $pecahan[$i] = str_split($pecah[$i]);
    sort($pecahan[$i]);
    foreach($pecahan[$i] as $val){
        echo $val;
    }
}
?>

