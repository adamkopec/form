<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 28.06.2013
 * Time: 00:01
 */

namespace App;


class SubForm extends \Zend_Form_SubForm {
    protected $scheme = \EasyBib_Form_Decorator::BOOTSTRAP;
    public function init() {
        $this->setMethod('POST');

        \EasyBib_Form_Decorator::setFormDecorator(
            $this, $this->scheme, 'submit'
        );
    }
}