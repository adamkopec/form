<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 19:37
 */

namespace App\Form\Builder;
use App\Form\AddToBasket\Product as SubForm;
use App\Entity\Product;
use App\Observable;
use App\Form\AddToBasket\Container as Form;

class AddToBasket extends Observable {

    protected $products;

    public function __construct(array $products) {
        $this->products = $products;
    }

    public function build() {
        $form = new Form();

        foreach($this->products as $id => $product) {
            $form->addSubForm($this->getSubFormFor($product),'product'.$id);
        }

        return $form;
    }

    protected function getSubFormFor(Product $product) {
        $form = new SubForm();
        $form->getElement('quantity')->setLabel($product->getName() . ':');
        $form->getElement('id')->setValue($product->getId());
        $form->getElement('id')->setDecorators(array(
            new \Zend_Form_Decorator_ViewScript(
                array('viewScript' => '_form/productid.phtml', 'product' => $product)
            )
        ));

        $this->notify('newProduct', $form);
        return $form;
    }
}