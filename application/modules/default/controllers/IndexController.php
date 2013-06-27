<?php

class Default_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
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
                    'uri'        => 'https://github.com/adamkopec/form',
                    'label'      => 'GitHub'
                )
            )
        );

        $this->view->navigation($container);
    }

}

