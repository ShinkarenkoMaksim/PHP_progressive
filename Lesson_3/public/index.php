<?

use app\models\{Basket, Product, User};
use app\engine\Db;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);



$product = new Product('Продукт1', 'Описание продукта 1', '123');
$product->insert();
$product->name = 'Продукт4';
$product->update();
//$product->delete();

var_dump($product);
//$basket = new Basket();

//var_dump($basket->getOne(79));



//$product = new Product();
//var_dump($product->getOne('1'));






