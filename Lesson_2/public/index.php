<?

use app\models\Basket;
use app\models\Order;
use app\models\Product;
use app\models\User;
use app\engine\Db;
use app\interfaces\IModel;

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
echo $product->getOne(3);

$user = new User(new Db());
echo $user->getAll();

var_dump($product);

function foo(IModel $model) {

}

$basket = new Basket(new Db());
echo $basket->getOne(5);

$order = new Order(new Db());
echo $order->getAll();