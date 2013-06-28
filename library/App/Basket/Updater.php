<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 28.06.2013
 * Time: 00:15
 */

namespace App\Basket;

use App\BasketStorage;
use App\Observable;

class Updater extends Observable {

    protected $formValues;

    public function __construct(array $values) {
        $this->formValues = $values;
    }

    public function updateBasket() {
        foreach($this->formValues as $elementValues) {
            $id = $elementValues['id'];
            $quantity = isset($elementValues['quantity']) ? $elementValues['quantity'] : 0;
            $delete = isset($elementValues['delete']);

            if (empty($id)) {
                continue;
            }

            if ($delete) {
                $quantity = 0;
            }

            $this->_update($id, $quantity);
        }
        $this->notify('updated', $this->_getBasket());
    }

    protected function _update($id, $quantity)
    {
        $basket = $this->_getBasket();

        if ($basket->hasProduct($id)) {
            $basketProduct = $basket->getProduct($id);
            if ($quantity > 0) {
                $basketProduct->setQuantity($quantity);
            } else {
                $basket->removeProduct($id);
            }
        } else {
            throw new \Exception(sprintf("Cannot update product %s, it is not present in the basket", $id));
        }
    }

    protected function _getBasket()
    {
        return BasketStorage::getInstance()->getBasket();
    }
}