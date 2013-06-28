<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 23:36
 */

namespace App\Form\Builder;

use App\Form\UpdateBasket\Container;
use App\Form\UpdateBasket\Product;
use App\Observable;
use App\Entity\BasketProduct;

class UpdateBasket extends Observable {
    protected $products;

    public function __construct(array $products) {
        $this->products = $products;
    }

    public function build() {
        $form = new Container();

        foreach($this->products as $id => $product) {
            $form->addSubForm($this->getProductSubForm($product),'product'.$id);
        }

        return $form;
    }

    protected function getProductSubForm(BasketProduct $basketProduct) {
        $product = $basketProduct->getProduct();
        $form = new Product();
        $form->getElement('id')->setValue($product->getId());
        $form->getElement('quantity')->setLabel($product->getName() . ':');
        $form->setDefault('quantity',$basketProduct->getQuantity());

        $form->getElement('quantity')->setDecorators(array(
            new \Zend_Form_Decorator_ViewScript(
                array('viewScript' => '_form/quantity.phtml', 'basketProduct' => $basketProduct, 'bonus' => $basketProduct->getBonus())
            )
        ));

        $this->notify('newProduct', $form);
        return $form;
    }
}