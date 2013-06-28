<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 20:30
 */

namespace App\Basket;


use App\Entity\BasketProduct;
use App\BasketStorage;
use App\Observable;
use App\Shop;

class Adder extends Observable {

    protected $formValues;

    public function __construct(array $values) {
        $this->formValues = $values;
    }

    public function addToBasket() {
        foreach($this->formValues as $elementValues) {
            $id = $elementValues['id'];
            $quantity = $elementValues['quantity'];

            if (empty($id) || empty($quantity)) {
                continue;
            }

            $this->_add($id, $quantity);
        }
        $this->notify('updated', $this->_getBasket());
    }

    protected function _add($id, $quantity)
    {
        $basket = $this->_getBasket();
        $product = Shop::getInstance()->getProduct($id);

        if ($basket->hasProduct($id)) {
            throw new \Exception("Produkt już istnieje w koszyku");
        } else {
            $basket->addProduct(new BasketProduct($product, $quantity));
        }
    }

    protected function _getBasket()
    {
        return BasketStorage::getInstance()->getBasket();
    }
}