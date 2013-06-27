<?php

class Default_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $builder = new \App\Business\AddToBasketBuilder();
        $form = $builder->build();

        if ($this->getRequest()->isPost() && $form->isValid($this->getRequest()->getPost())) {
            $adder = new \App\Basket\Adder($form->getValues());
            try {
                $adder->addToBasket();
            } catch(Exception $e) {
                $form->addError($e->getMessage());
            }
        }

        $this->view->addToBasketForm = $form;
    }

    public function headerAction()
    {
        $container = new Zend_Navigation(
            array(
                array(
                    'action'     => 'index',
                    'controller' => 'form',
                    'module'     => 'default',
                    'label'      => 'Home'
                ),
                array(
                    'action'     => 'clear',
                    'controller' => 'form',
                    'module'     => 'default',
                    'label'      => 'Clear basket'
                ),
                array(
                    'uri'        => 'https://github.com/adamkopec/form',
                    'label'      => 'GitHub'
                )
            )
        );

        $this->view->navigation($container);
    }

}

