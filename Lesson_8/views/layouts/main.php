<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?if ($auth):?>
    Добро пожаловать <?=$username?> <a href="/user/logout/"> [Выход]</a>
<?else:?>
    <form action="/user/login/" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="pass" placeholder="Пароль">
        <input type="checkbox" name="save" id="save">
        <label for="save">Запомнить</label>
        <input type="submit" name="submit" value="Войти">
    </form>
<?endif;?><br>
<?=$menu?><br>
<?=$content?>
</body>
<script>
    let buttonsBuy = document.querySelectorAll('.buy');

    buttonsBuy.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/Api/AddBasket/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;

            })();
        })
    })

    let buttonsDel = document.querySelectorAll('.delete');

    buttonsDel.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/Api/DeleteBasket/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
                document.getElementById('id' + id).innerHTML = '';
            })();
        })
    })
</script>
</html>