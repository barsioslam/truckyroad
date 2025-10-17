<?php

namespace App\Models;

use App\DB\Database;

class Truck extends Model {
    
    function __construct()
    {
        $this->table = 'trucks';
        parent::__construct();
    }

}

?>