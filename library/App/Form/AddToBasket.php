<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 19:33
 */

namespace App\Form;


class AddToBasket extends \Zend_Form {

    public function init() {
        $this->setMethod('POST');

        $this->addElement('submit', 'submit',array('order' => 999,'label' => 'Dodaj do koszyka'));

        \EasyBib_Form_Decorator::setFormDecorator(
            $this, \EasyBib_Form_Decorator::BOOTSTRAP, 'submit'
        );
    }
}