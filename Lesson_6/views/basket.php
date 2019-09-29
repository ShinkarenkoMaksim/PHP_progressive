<h2>Корзина</h2><hr>
<? foreach ($products as $item): ?>
    <h2><?=$item['name']?></h2>
    <p>Описание:<?=$item['description']?></p>
    <p>Цена:<?=$item['price']?></p>

    <button data-id="<?= $item['id_basket']?>" class="delete">Удалить</button>
<? endforeach; ?>