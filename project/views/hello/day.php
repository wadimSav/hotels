<h1><?= $h1; ?></h1>
<div id="content">
	<table style="text-align: center;width: 100%;border: 1px solid;">
		<tr>
			<th>Номер</th>
			<th>Категория номера</th>
			<th>Тип уборки</th>
			<th>Начало уборки</th>
			<th>Конец уборки</th>
			<th>Сумма за уборку</th>
		</tr>
        <?php $total = 0; ?>
		<?php foreach ($oneDay as $workDay): ?>
            <tr>
                <td><?= $workDay['room']; ?> <?= $workDay['name']; ?></td>
                <td><?= $workDay['type']; ?></td>
                <td><?= $workDay['workn']; ?></td>
                <td><?= $workDay['start']; ?></td>
                <td><?= $workDay['end']; ?></td>
                <?php 
                    $sum = $workDay['price'];
                    if($workDay['bed'] == 1){
                        $sum += 30;
                    }
                    if($workDay['towels'] == 1){
                        $sum += 10;
                    }
                ?>
                <td><?= $sum; ?></td>
                <?php $total += $sum; ?>
            </tr>
		<?php endforeach; ?>
        <tr>
            <td colspan="6">Итоговая сумма за день: <?= $total; ?></td>
        </tr>
	</table>
</div>
