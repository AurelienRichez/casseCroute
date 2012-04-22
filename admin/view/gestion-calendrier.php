<?php

//TODO à faire

function writeMonth($year,$month,$validDays,$startDay) {
	?>
<table class="calendar">
	<tr>
		<th colspan="7"><?php echo $month. ' - '.getMonth($month); ?></th>
	</tr>
	<tr>
		<th>L</th>
		<th>M</th>
		<th>M</th>
		<th>J</th>
		<th>V</th>
		<th>S</th>
		<th>D</th>
	</tr>
	<?php 
	for($i=1;$i<=count($validDays)+$startDay-1;$i++) {
		if($i % 7 == 1) {
			echo '<tr>';
		}
		if($i<$startDay) {
			echo '<td class="case_vide"></td>';
		}
		else{
			$day = $i-$startDay+1;
			
			$class = $validDays[$day] ? 'valid_day' : 'invalid_day';

			echo '<td class="'.$class.'"><a href="admin-gestion-calendrier.html?'.$class.'='.$year.'-'.($month < 10 ? '0'.$month : $month).'-'.($day < 10 ? '0'.$day : $day).'">'.
					($i-$startDay+1).'</a></td>';
		}
		if($i % 7 == 0) {
			echo '</tr>';
		}
	}
	?>
</table>
<?php
}

function getMonth($month) {
	switch($month) {
		case 1:
			return 'janvier';
		case 2:
			return 'février';
		case 3:
			return 'mars';
		case 4:
			return 'avril';
		case 5:
			return 'mai';
		case 6:
			return 'juin';
		case 7:
			return 'juillet';
		case 8:
			return 'août';
		case 9:
			return 'septembre';
		case 10:
			return 'octobre';
		case 11:
			return 'novembre';
		case 12:
			return 'décembre';
	}
}

function writeCalendar($startMonth,$year, Calendrier $cal) {
	$month = $startMonth;
	for($i = 0 ; $i<6 ; $i++) {
		if($month==13) {
			$month = 1;
			$year++;
		}
		$startDay = date('N',strtotime($year.'-'.$month.'-01'));
		writeMonth($year, $startMonth+$i, $cal->getValidDayForMonth($month,$year),$startDay);
		$month++;
	}
}



