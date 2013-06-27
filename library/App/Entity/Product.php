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

    public function __construct($price = 0, $name = '') {
        self::$cnt++;
        $this->id = self::$cnt;
        $this->price = $price;
        $this->name = $name;
    }

    protected $id;
    protected $price;
    protected $name;

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

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}