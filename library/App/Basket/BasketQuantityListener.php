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
use App\Listener;

class BasketQuantityListener implements Listener {

    /**
     * @var Basket
     */
    protected $basket;

    public function __construct() {
        $this->basket = BasketStorage::getInstance()->getBasket();
    }

    public function newProduct(\Zend_Form $productForm) {
        $id = $productForm->getElement('id')->getValue();
        if ($this->basket->hasProduct($id)) {
            $productForm->setDefault('quantity', $this->basket->getProduct($id)->getQuantity());
        }
    }
}