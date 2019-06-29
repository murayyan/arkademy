<?php
/** 
	$num_char merupakan jumlah karakter vertikal dan horizontal
	untuk kerapian isikan nilai ganjil misal 27 atau 31 
*/
$num_char 	 = 29; 
// onehalf_var nantinya nilainya bisa bertambah / berkurang, sedangkan half tetap
$onehalf 	 = floor($num_char / 2);
$onehalf_var = $onehalf;
$char1 		 = '.';
$char2 		 = '*';

echo '<div style="font:bold 16px courier new; line-height:10px">';
// loop baris
for ($row = 1; $row <= $num_char; $row++)
{
	// loop kolom
	for ($col = 1; $col <= $num_char; $col++)
	{
		$char =	$col > $onehalf_var && $col <= ($num_char - $onehalf_var) ? $char2 : $char1;
		echo $char;	
	}
	$row <= $onehalf ? $onehalf_var-- : $onehalf_var++;	
	echo '<br/>';
}
echo '</div>';
?>