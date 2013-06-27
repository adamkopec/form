<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 21:14
 */

namespace App\Business;


class AddToBasketBuilder {
    public function build() {
        $shop = \App\Shop::getInstance();
        $builder = new \App\Form\Builder\AddToBasket($shop->getProducts());
        $builder->addListener(new \App\Business\AddToBasketListener());
        $builder->addListener(new \App\Basket\FormListener());
        return $builder->build();
    }
}