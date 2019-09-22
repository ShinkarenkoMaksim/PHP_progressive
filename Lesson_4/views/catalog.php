<h2>Каталог</h2>
<div id="catalog">
<? foreach ($catalog as $key => $good):?>
    <div>
        <a href="/?c=product&a=card&id=<?=$good["id"]?>">
            <b><?=$good['name']?></b></a><br>
        Цена: <?=$good['price']?><br><br>
    </div>
<? endforeach;?>
</div>
<button class="else">Показать еще</button><br>
<button class="all">Показать все</button>
<script>

</script>