<?

use app\models\{Basket, Product, User};
use app\engine\Db;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);



//$product = new Product('Продукт1', 'Описание продукта 1', '123');
//$product->insert();



$product = new Product();
$product->getOne('1');
var_dump($product);
//var_dump($product->getOne(1));







