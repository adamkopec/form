<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 19:37
 */

namespace App\Form\Builder;
use App\Form\AddBasketProduct;
use App\Entity\Product;
use App\Observable;

class AddToBasket extends Observable {

    protected $products;

    public function __construct(array $products) {
        $this->products = $products;
    }

    public function build() {
        $form = new \App\Form\AddToBasket();

        foreach($this->products as $id => $product) {
            $form->addSubForm($this->getSubFormFor($product),'product'.$id);
        }

        return $form;
    }

    protected function getSubFormFor(Product $product) {
        $form = new AddBasketProduct();
        $form->getElement('id')->setValue($product->getId());
        $form->getElement('quantity')->setLabel($product->getName() . ':');
        $this->notify('newProduct', $form);
        return $form;
    }
}