<h1><?= $h1; ?></h1>
<div id="content">
	<table>
		<tr>
			<th>Дата</th>
			<th>Начало</th>
			<th>Конец</th>
			<th>Генеральных</th>
			<th>Текущих</th>
			<th>Заездов</th>
			<th>Сумма</th>
		</tr>
		<?php foreach ($dates as $day): ?>
            <tr>
                <td><a href="/hello/<?php $date = new DateTime($day['created']); echo $date->format('Y-m-d'); ?>/"><?= $date->format('Y-m-d'); ?></a></td>
                <td><?= $day['start']; ?></td>
                <td><?= $day['end']; ?></td>
                <?php $general = 0; $current = 0; $arrival = 0; $sum = 0; ?>
                <?php foreach ($works as $work): ?>
                    <?php 
                        $workDate = new DateTime($work['created']); 
                        $workDate->format('Y-m-d');

                        if($date->format('Y-m-d') == $workDate->format('Y-m-d') && $work['work'] == 2){
                            $general++;
                        }
                        if($date->format('Y-m-d') == $workDate->format('Y-m-d') && $work['work'] == 3){
                            $current++;
                        }
                        if($date->format('Y-m-d') == $workDate->format('Y-m-d') && $work['work'] == 1){
                            $arrival++;
                        }
                    ?>
                <?php endforeach; ?>
                <td><?= $general; ?></td>
                <td><?= $current; ?></td>
                <td><?= $arrival; ?></td>
                <?php foreach ($earnings as $earning): ?>
                    <?php 
                        $earningDate = new DateTime($earning['created']); 
                        $earningDate->format('Y-m-d');

                        if($date->format('Y-m-d') == $earningDate->format('Y-m-d')){
                            $sum += $earning['price'];
                            if($earning['bed'] == 1){
                                $sum += 30;
                            }
                            if($earning['towels'] == 1){
                                $sum += 10;
                            }
                        }
                    ?>
                <?php endforeach; ?>
                <td><?= $sum; ?></td>
            </tr>
		<?php endforeach; ?>
	</table>
</div>
