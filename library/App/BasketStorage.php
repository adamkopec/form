<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 20:37
 */

namespace App;


class BasketStorage {
    private static $instance;

    protected $session;

    private function __construct() {
        $this->session = new \Zend_Session_Namespace('basket');

        if (!isset($this->session->basket)) {
            $this->session->basket = new Entity\Basket();
        }
    }

    private function __clone(){}

    public static function getInstance ()
    {
        //Wersja czytelniejsza
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return \App\Entity\Basket
     */
    public function getBasket() {
        return $this->session->basket;
    }
}