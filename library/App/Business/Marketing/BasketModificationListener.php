<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 28.06.2013
 * Time: 03:50
 */

namespace App\Business\Marketing;


use App\Entity\Basket;
use App\Entity\BasketProduct;
use App\Entity\Product;
use App\Listener;

class BasketModificationListener implements Listener {
    const THRESHOLD = 400;

    public function updated(Basket $basket) {
        foreach($basket->getProducts() as $basketProduct) {
            if ($this->_productQualifies($basketProduct)) {
                $basketProduct->setBonus(
                    new Product(0,"Gratis dla " . $basketProduct->getProduct()->getName())
                );
            } else {
                $basketProduct->setBonus(null);
            }
        }
    }

    protected function _productQualifies(BasketProduct $basketProduct) {
        return $basketProduct->getValue() >= self::THRESHOLD && $basketProduct->getProduct()->isInPromotion();
    }
}