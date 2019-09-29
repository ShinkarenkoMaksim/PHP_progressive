<h2>Каталог</h2>
<? foreach ($catalog as $item): ?>
    <a href="/product/card/?id=<?= $item['id'] ?>"><h3><?= $item['name'] ?></h3></a>
    <p>Цена: <?= $item['price'] ?></p>
    <button data-id="<?= $item['id'] ?>" class="buy">Купить</button>
<? endforeach; ?>

