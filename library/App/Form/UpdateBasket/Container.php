<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 23:40
 */

namespace App\Form\UpdateBasket;


use App\Form;

class Container extends Form {
    public function init() {
        $this->addElement('submit', 'submit',array('order' => 999,'label' => 'Zapisz koszyk'));

        parent::init();
    }
}