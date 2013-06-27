<?php

class Default_FormController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function clearAction() {
        \App\BasketStorage::getInstance()->getBasket()->clear();
        return $this->_helper->redirector('index','index');
    }

}

