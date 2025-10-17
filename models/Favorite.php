<?php

namespace App\Models;

use App\DB\Database;

class Favorite extends Model {
    
    function __construct()
    {
        $this->table = 'favorites';
        parent::__construct();
    }

}

?>