<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 28.06.2013
 * Time: 00:09
 */

namespace App\Business;

use App\Basket\BasketQuantityListener;
use App\BasketStorage;
use App\Form\Builder\UpdateBasket;

class UpdateBasketBuilder {
    /**
     * @return \App\Form\UpdateBasket\Container
     */
    public function build() {
        $basket = BasketStorage::getInstance()->getBasket();
        $builder = new UpdateBasket($basket->getProducts());
        $builder->addListener(new QuantityValidationListener());
        $builder->addListener(new BasketQuantityListener());

        return $builder->build();
    }
}