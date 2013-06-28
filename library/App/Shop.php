<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 19:18
 */

namespace App;
use App\Entity\Product;

class Shop {

    private static $instance;
    private function __clone(){}

    public static function getInstance ()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @var Product[]
     */
    protected $products;

    private function __construct() {
        $products = [
            [100, "Karburator",false],
            [200, "Wariator",true],
            [300, "Alternator",true],
            [400, "Radiator",false]
        ];

        while(count($products)) {
            list($price,$name,$promo) = array_shift($products);
            $product = new Product($price,$name,$promo);
            $this->products[$product->getId()] = $product;
        }
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    public function getProduct($id) {
        return $this->products[$id];
    }
}