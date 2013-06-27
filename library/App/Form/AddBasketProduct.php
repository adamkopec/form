<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 19:55
 */

namespace App\Form;


class AddBasketProduct extends \Zend_Form_SubForm {

    public function init() {
        $this->addElement('text','quantity',array(
            'validators' => array(array('Digits'))
        ));

        $this->addElement('hidden', 'id');
    }
}