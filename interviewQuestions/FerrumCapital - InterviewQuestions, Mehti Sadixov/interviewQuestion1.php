<?php
// $startDate = new DateTime("2003-02-30");
// $endDate = new DateTime("2008-01-22");
// $interval = $date1->diff($date2);
// echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

// // shows the total amount of days (not divided into years, months and days like above)
// echo "difference " . $interval->days . " days ";

$startDate = "2003-02-30";
$endDate = "2008-01-31";

$diff = abs(strtotime($endDate) - strtotime($startDate));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

printf("%d years, %d months, %d days\n", $years, $months, $days);
?>
