<?php
include "include/db_Query.php";
include "include/config.php";

$domain = $_SERVER["SERVER_NAME"];
$sql = "select user_id from member where db_name=\"".mysql_real_escape_string($domain)."\" ";
$result = mysql_query($sql);
$myrow = mysql_fetch_array($result);
$user_id = $myrow["user_id"];
echo mysql_error();
//休日情報の取得
$sql = "select * from holiday";
$result = mysql_query($sql);
$array_holiday= array();
while( $myrow = mysql_fetch_array($result) ) {
	$_holiday = (int)($myrow["year"].$myrow["month"].$myrow["day"]);
	$array_holiday[$_holiday] = $_holiday;
}

function lfCalList($user_id,$year,$month) {
	$sql  = "SELECT * from calendar WHERE ";
	$sql .= "user_id=\"".mysql_real_escape_string($user_id)."\" AND ";
	$sql .= "year=\"".mysql_real_escape_string($year)."\" AND ";
	$sql .= "month=\"".mysql_real_escape_string($month)."\" ";
	$result = mysql_query($sql);
	$cal_array = array();
	if( mysql_num_rows($result) == 1 ) {
		$myrow = mysql_fetch_array($result);
		for( $day=1; checkdate( $month, $day, $year ); $day++ ) {
			$cal_array[ "day".$day ] = $myrow["day".$day];
		}
	}
	return $cal_array;
}
?>
