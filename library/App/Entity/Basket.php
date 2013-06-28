<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 19:06
 */

namespace App\Entity;


class Basket {

    /**
     * @var BasketProduct[]
     */
    protected $products = [];

    public function addProduct(BasketProduct $p) {
        $this->products[$p->getProduct()->getId()] = $p;
    }

    /**
     * @return BasketProduct[]|array
     */
    public function getProducts() {
        return $this->products;
    }

    public function getProduct($id) {
        return $this->products[$id];
    }

    public function hasProduct($id) {
        return isset($this->products[$id]);
    }

    public function clear() {
        $this->products = [];
    }

    public function removeProduct($id) {
        unset($this->products[$id]);
    }

    public function getValue() {
        $sum = 0;
        foreach($this->products as $p) {
            $sum += $p->getValue();
        }
        return $sum;
    }
    public function isEmpty() {
        return count($this->products) == 0;
    }
}