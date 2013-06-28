<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 19:09
 */

namespace App\Entity;


class Product {
    protected static $cnt = 665;

    protected $id;
    protected $price;
    protected $name;
    protected $promo = false;

    public function __construct($price = 0, $name = '', $promo = false) {
        self::$cnt++;
        $this->id = self::$cnt;
        $this->price = $price;
        $this->name = $name;
        $this->promo = $promo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function isInPromotion() {
        return $this->promo;
    }

    public function setInPromotion($flag) {
        $this->promo = (bool)$flag;
    }
}