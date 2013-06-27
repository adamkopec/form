<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 20:23
 */

namespace App\Business;


use App\Form\AddBasketProduct;
use App\Listener;

class AddToBasketListener implements Listener {

    public function newProduct(AddBasketProduct $form) {
        $form->getElement('quantity')
            ->addValidator(new \Zend_Validate_LessThan('3'),true)
            ->setErrorMessages(
                array(
                    \Zend_Validate_LessThan::NOT_LESS =>
                    'Z biznesowego punktu widzenia musi być mniej niż trzy'
                )
            );
    }
}