<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 28.06.2013
 * Time: 04:06
 */

namespace App\Business;


class BasketUpdater {

    protected $form;

    public function __construct($form) {
        $this->form = $form;
    }

    public function updateBasket() {
        $buttonFilter = new \App\Form\SubFormButtonFilter($this->form);
        $values = $buttonFilter->getValuesWithClickedButtons('delete');
        $updater = new \App\Basket\Updater($values);
        $updater->addListener(new \App\Business\Marketing\BasketModificationListener());
        return $updater->updateBasket();
    }
}