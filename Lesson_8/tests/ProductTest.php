<?php


namespace app\tests;

use app\models\entities\Product;
use Exception;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @dataProvider providerFactorial
     * @param $name
     * @param $description
     * @param $price
     * @throws Exception
     */
    public function testProduct($name, $description, $price) {
        $product = new Product($name, $description, $price);
        $this->assertEquals($name, $product->name);
        $this->assertEquals($description, $product->description);
        $this->assertEquals($price, $product->price);
    }
    public function providerFactorial()
    {
        return array (
            array (0, 1, "as"),
            array ("asdfwer\\fawe", "asdfasd", 235),
            array ("gfv", "gfv", null)
        );
    }


}