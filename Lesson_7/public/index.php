<?
session_start();

use app\engine\Render;
use app\engine\Request;
use app\engine\TwigRender;
use app\models\{Basket, Product, User};
use app\engine\Db;

try {
    include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
    //include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/../vendor/autoload.php";


    //spl_autoload_register([new Autoload(), 'loadClass']);

    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'product';
    $actionName = $request->getActionName();

    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new Render());
        $controller->runAction($actionName);
    } else {
        echo "Не правильный контроллер";
    }
} catch (\PDOException $e) {
            var_dump("Ошибка PDO");
        }
    catch (\Exception $e) {
            var_dump($e);
            var_dump($e->getTrace());
    }


/**
 * @var Product $product
 */

//$product = new Product("Баунти", "Вкусный", 12);
//$product = Product::getOne('2');
//$product->delete();
//$product->save();
//$product = Product::getCountWhere("sessioin_id",session_id());

//$product->setName("Сникерс2");

//$product->save();

//var_dump(($product));
//var_dump(get_class_methods($product));

