<?php
echo hitungPohon(2,2);
function hitungPohon($tinggiAwal, $tahun){
    $tinggiAkhir = $tinggiAwal;
    for($i=1; $i<=$tahun; $i++){
        $tinggiAkhir +=1; //semi
        $tinggiAkhir *=3; //panas
        $tinggiAkhir -= 1.5; //gugur
        $tinggiAkhir += 0.15*$tinggiAkhir; //dingin
        if($i%2==0){
            $tinggiAkhir /= 2;
        }
    }
    return $tinggiAkhir;
}
