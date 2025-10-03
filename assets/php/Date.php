<?php

class Date {

    public static function now() : int {
        return time();
    }

    public static function getFullDate() : string {
        return date('d/m/Y H:i:s');
    }

}

?>