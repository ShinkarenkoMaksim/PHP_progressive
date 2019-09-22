<h2>Заказы</h2>
<? foreach ($basket as $key => $good):?>
    <div>
        <a href="/?c=product&a=card&id=<?=$good["id"]?>">
            <b><?=$good['session_id']?></b></a><br>
        Цена: <?=$good['product_id']?><br><br>
    </div>
<? endforeach;?>
