<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 20:58
 */

namespace App\Basket;


use App\BasketStorage;
use App\Entity\Basket;
use App\Form\AddBasketProduct;
use App\Listener;

class FormListener implements Listener {

    /**
     * @var Basket
     */
    protected $basket;

    public function __construct() {
        $this->basket = BasketStorage::getInstance()->getBasket();
    }

    public function newProduct(AddBasketProduct $form) {
        $id = $form->getElement('id')->getValue();
        if ($this->basket->hasProduct($id)) {
            $form->setDefault('quantity', $this->basket->getProduct($id)->getQuantity());
        }
    }
}