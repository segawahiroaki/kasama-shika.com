<?php
$host = "59.106.167.117";

$id   = "news_tool_aws";
$pass=  "EdGj78I6d";
$db = "news_calc";
$link = mysql_connect($host,$id,$pass);
if( !$link ) {
	$id   = "news_tool2";
	$pass=  "aRfV4f34DF";
	$db = "news_calc";
	$link = mysql_connect($host,$id,$pass);
}
$sdb = mysql_select_db($db,$link);// or die("データベースの選択に失敗しました。");
mysql_query("set names utf8");
?>
