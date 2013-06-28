<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 23:47
 */

namespace App\Form\UpdateBasket;

class Product extends \Zend_Form_SubForm {

    public function init() {
        $this->addElement('text','quantity',array(
            'validators' => array(array('Digits',true))
        ));

        $this->addElement('hidden', 'id');
        $this->addElement('submit', 'delete', array('label' => 'Usuń'));


        parent::init();
    }
}