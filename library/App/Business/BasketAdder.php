<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 28.06.2013
 * Time: 04:11
 */

namespace App\Business;


class BasketAdder {

    protected $form;

    public function __construct($form) {
        $this->form = $form;
    }

    public function addToBasket() {
        $adder = new \App\Basket\Adder($this->form->getValues());
        $adder->addListener(new \App\Business\Marketing\BasketModificationListener());
        return $adder->addToBasket();
    }
}