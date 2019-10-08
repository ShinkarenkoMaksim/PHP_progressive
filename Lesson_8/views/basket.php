<h2>Корзина</h2><hr>
<? foreach ($products as $item): ?>
    <div id="id<?= $item['id_basket']?>">
        <h2><?=$item['name']?></h2>
        <p>Описание:<?=$item['description']?></p>
        <p>Цена:<?=$item['price']?></p>

        <button data-id="<?= $item['id_basket']?>" class="delete">Удалить</button>
    </div>


<? endforeach; ?>
<hr><br>

<div class="order">
    <form action="\order\add" method="POST">
        <input type="text" name="name" id="name" placeholder="ФИО">
        <label for="name">ФИО</label><br><br>
        <input type="tel" name="phone" id="phone" placeholder="Телефон">
        <label for="phone">Телефон</label><br><br>
        <input type="email" name="email" id="email" placeholder="E-mail">
        <label for="email">E-mail</label><br><br>
        <input type="submit" value="Оформить заказ">
    </form>
</div>
