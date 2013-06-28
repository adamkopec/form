<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 19:33
 */

namespace App\Form\AddToBasket;

use App\Form;

class Container extends Form {
    public function init() {
        $this->addElement('submit', 'submit',array('order' => 999,'label' => 'Dodaj do koszyka'));

        parent::init();
    }
}