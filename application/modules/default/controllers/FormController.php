<?php

class Default_FormController extends Zend_Controller_Action
{
    /**
     * @var Zend_Controller_Action_Helper_FlashMessenger
     */
    protected $msg;

    public function init()
    {
        $this->msg = $this->_helper->flashMessenger;
    }

    public function indexAction()
    {
        $builder = new \App\Business\AddToBasketBuilder();
        $form = $builder->build();

        $this->_tryOnPost($form, function(Zend_Form $form) {
            $adder = new \App\Business\BasketAdder($form);
            $adder->addToBasket();
            $this->msg->addMessage(array('success', "Dodano poprawnie."));
            $this->_helper->redirector('index','form','default');
        });

        $this->view->addToBasketForm = $form;
    }

    public function updateAction() {
        $builder = new \App\Business\UpdateBasketBuilder();
        $form = $builder->build();

        $this->_tryOnPost($form, function(Zend_Form $form) {
            $updater = new \App\Business\BasketUpdater($form);
            $updater->updateBasket();
            $this->msg->addMessage(array('success', "Zaktualizowano poprawnie."));
            $this->_helper->redirector('update','form','default');
        });

        if (\App\BasketStorage::getInstance()->getBasket()->isEmpty()) {
            $this->msg->addMessage(array('warning', "Koszyk jest pusty"));
            $this->_helper->redirector('index','form','default');
        }

        $this->view->updateBasketForm = $form;
    }

    public function clearAction() {
        \App\BasketStorage::getInstance()->getBasket()->clear();
        $this->msg->addMessage(array('success', "Koszyk został wyczyszczony"));
        return $this->_helper->redirector('index','form');
    }

    protected function _tryOnPost(Zend_Form $form, Closure $code) {
        if ($this->getRequest()->isPost() && $form->isValid($this->getRequest()->getPost())) {
            try {
                return $code($form);
            } catch(Exception $e) {
                $this->msg->addMessage(array('error', "Błąd: " . $e->getMessage()));
                $this->_helper->redirector('index','form','default');
            }
        }
    }

}

