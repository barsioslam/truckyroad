<?php

namespace App\Models;

use App\DB\Database;

class Review extends Model {
    
    function __construct()
    {
        $this->table = 'reviews';
        parent::__construct();
    }

}

?>