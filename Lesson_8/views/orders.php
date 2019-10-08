<h2>Заказы</h2><hr>

<? foreach ($products as $item): ?>
    <div id="id<?= $item['id_basket']?>">
        <h2><?=$item['name']?></h2>
        <p>Описание:<?=$item['description']?></p>
        <p>Цена:<?=$item['price']?></p>
        <p>Статус: <? switch ($item['status']): ?>
<? case 0: ?>Ожидает обработки <? break; ?>
        <? case 1: ?>Ожидает оплаты <? break; ?>
        <? case 2: ?>Оплачено <? break; ?>
        <? case 3: ?>Выполнен <? break; ?>
        <? case 4: ?>Отменён <? break; ?>
        <? endswitch; ?></p>
    </div>

<? endforeach; ?>