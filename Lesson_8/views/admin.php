<h2>Админка</h2>

<? foreach ($orders as $item):?>
    <hr>
    <p>
        <h3>Номер заказа: <?=$item['id']?></h3><br>
        <span>Имя: <?=$item['name']?>,</span><br>
        <span>Телефон: <?=$item['phone']?>,</span><br>
        <span>Адрес: <?=$item['email']?>,</span><br>

        <select name="status"
                id="status_<?=$item['id']?>" data-id="<?=$item['id']?>" class="status">
            <option value="0" <? if ($item['status'] == '0'):?>selected<?endif;?>>Ожидает обработки</option>
            <option value="1" <? if ($item['status'] == '1'):?>selected<?endif;?>>Ожидает оплаты</option>
            <option value="2" <? if ($item['status'] == '2'):?>selected<?endif;?>>Оплачено</option>
            <option value="3" <? if ($item['status'] == '3'):?>selected<?endif;?>>Выполнен</option>
            <option value="4" <? if ($item['status'] == '4'):?>selected<?endif;?>>Отменён</option>
        </select>
    </p>
<!--    Решил сделать через дитейлз, не сразу заметил, что нужно открывать отдельную страницу-->
    <details>
        <summary>Подробности</summary>
        <? if (!is_null($item['products'])): ?>
            <?foreach ($item['products'] as $prod):?>
                <div id="item_<?=$prod['id_basket']?>">
                    <h4><?=$prod['name']?></h4>
                    <p>Описание:<?=$prod['description']?></p>
                    Цена: <?=$prod['price']?>
                    <hr>
                </div>

            <?endforeach;?>
        <? endif; ?>
    </details>

    <br>
    <hr>
<?endforeach;?>
