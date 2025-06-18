<?php
include "include/calendar.php";
?>


<?php
	$day_array = array("日","月","火","水","木","金","土");
	$counter = 2;
	$month = date('n');
	$year = date("Y");
	for( $start=0; $start<$counter; $start++ ) {
		$month = date('n') + $start;
		if( $month >= 13 ) {
			$year = date("Y") + 1;
			$month = $month - 12;
		}
		echo "<div class=\"month animation\" id=\"cal0".($start+1)."\">\n";
		echo "<em>".$year."年".$month."月</em>\n";
		echo "<table class=\"CalendarTable\">\n";
		echo "<thead>\n";
		echo "<tr>\n";
		echo "<th class=\"holiday\" abbr=\"日曜日\" scope=\"col\">日</th>\n";
		echo "<th scope=\"col\" abbr=\"月曜日\">月</th>\n";
		echo "<th scope=\"col\" abbr=\"火曜日\">火</th>\n";
		echo "<th scope=\"col\" abbr=\"水曜日\">水</th>\n";
		echo "<th scope=\"col\" abbr=\"木曜日\">木</th>\n";
		echo "<th scope=\"col\" abbr=\"金曜日\">金</th>\n";
		echo "<th scope=\"col\" abbr=\"土曜日\" class=\"saturday\">土</th>\n";
		echo "</tr>\n";
		echo "</thead>\n";
		echo "<tbody>\n";

		$fir_weekday = date( "w", mktime( 0, 0, 0, $month, 1, $year ) );
		echo "<tr>\n";
		$i = 0;
		while( $i != $fir_weekday ) {
			echo "<td>&nbsp;</td>\n";
			$i++;
		}
		$cal_array = lfCalList($user_id,$year,$month);
		for( $_day=1; checkdate( $month, $_day, $year ); $_day++ ) {
			//曜日の最後まできたらカウント値（曜日カウンター）を戻して行を変える
			if( $i > 6 ){
        		$i = 0;
				echo "</tr>\n";
				echo "<tr>\n";
			}
			$holidaycheck = (int)($year.sprintf("%02d",$month).sprintf("%02d",$_day) );
			$style = "";
			if( array_key_exists($cal_array[ "day".$_day ],$styletype) ) {
      			$style = " class=\"".$styletype[ $cal_array[ 'day'.$_day ] ]."\"";
      			if($i == 0 || array_key_exists($holidaycheck,$array_holiday)) $style = " class=\"holiday ".$styletype[ $cal_array[ 'day'.$_day ] ]."\"";
      			if($i == 6 ) $style = " class=\"saturday ".$styletype[ $cal_array[ 'day'.$_day ] ]."\"";
      		} else {
      			if( $i == 0 || array_key_exists($holidaycheck,$array_holiday) ) {
      				$style = " class=\"holiday\"";
      			} elseif( $i == 6 ) {
      				$style = " class=\"saturday\"";
      			}
      		}
			echo "<td".$style."><span>".$_day."</span></td>";
			$i++;
		}
		while( $i < 7 ){ //残りの曜日分空白（&nbsp;）で埋める
			echo "<td>&nbsp;</td>";
			$i++;
		}
		echo "</tr>\n";
		echo "</tbody>\n";
		echo "</table>\n";
		echo "</div>\n";
	}
?>

<!--
</body>

</html>
 -->