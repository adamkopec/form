<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 20:30
 */

namespace App\Basket;


use App\Entity\BasketProduct;
use App\Shop;

class Adder {

    protected $values;

    public function __construct(array $values) {
        $this->values = $values;
    }

    public function addToBasket() {
        foreach($this->values as $subform => $elements) {
            $basket = \App\BasketStorage::getInstance()->getBasket();
            $id = $elements['id'];
            if (empty($id)) {
                continue;
            }

            $quantity = $elements['quantity'];

            $product = Shop::getInstance()->getProduct($id);

            if ($basket->hasProduct($id)) {
                $basketProduct = $basket->getProduct($id);
                $basketProduct->setQuantity($basketProduct->getQuantity() + $quantity);
            } else {
                $basket->addProduct(new BasketProduct($product,$quantity));
            }
        }
    }
}