<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 28.06.2013
 * Time: 03:17
 */

namespace App\Form;


class SubFormButtonFilter {

    protected $form;
    protected $values;

    public function __construct(\Zend_Form $form) {
        $this->form = $form;
    }

    public function getValuesWithClickedButtons($fieldNames) {
        if(!is_array($fieldNames)) {
            $fieldNames = array($fieldNames);
        }
        $this->values = $this->form->getValues();

        foreach($this->form->getSubForms() as $name => $subForm) {
            foreach($fieldNames as $fieldName) {
                $this->_checkSubForm($name, $fieldName);
            }
        }

        return $this->values;
    }

    protected function _checkSubForm($name, $fieldName)
    {
        $subForm = $this->form->getSubForm($name);

        if (!$subForm->getElement($fieldName)) {
            return;
        }

        $value = $subForm->getUnfilteredValue($fieldName);
        if ($value === null) {
            unset($this->values[$name][$fieldName]);
        } else {
            $this->values[$name][$fieldName] = $value;
        }
    }
}