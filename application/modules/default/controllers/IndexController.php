<?php

class Default_IndexController extends Zend_Controller_Action
{
    public function indexAction() {
        return $this->_helper->redirector('index','form');
    }

    public function headerAction()
    {
        $container = new Zend_Navigation(
            array(
                array(
                    'action'     => 'index',
                    'controller' => 'form',
                    'module'     => 'default',
                    'label'      => 'Add'
                ),
                array(
                    'action'     => 'update',
                    'controller' => 'form',
                    'module'     => 'default',
                    'label'      => 'Update'
                ),
                array(
                    'action'     => 'clear',
                    'controller' => 'form',
                    'module'     => 'default',
                    'label'      => 'Clear'
                ),
                array(
                    'uri'        => 'https://github.com/adamkopec/form',
                    'label'      => 'GitHub'
                )
            )
        );

        $this->view->navigation($container);
        $msg = $this->_helper->flashMessenger;
        $this->view->messages = $msg->getMessages();
    }

}

