<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 21:14
 */

namespace App\Business;

use App\Shop;
use App\Form\Builder\AddToBasket;
use App\Business\QuantityValidationListener;

class AddToBasketBuilder {
    /**
     * @return \App\Form\AddToBasket\Container
     */
    public function build() {
        $shop = Shop::getInstance();
        $builder = new AddToBasket($shop->getProducts());
        $builder->addListener(new QuantityValidationListener());
        return $builder->build();
    }
}