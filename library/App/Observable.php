<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adamkopec
 * Date: 27.06.2013
 * Time: 20:21
 */

namespace App;

use App\Listener;

class Observable {
    protected $listeners;

    public function addListener(Listener $listener) {
        $this->listeners[] = $listener;
    }

    protected function notify($method) {
        $args = func_get_args();
        foreach($this->listeners as $listener) {
            call_user_func_array(array($listener, $method),array_slice($args,1));
        }
    }
}