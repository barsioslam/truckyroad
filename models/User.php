<?php

namespace App\Models;

use App\DB\Database;

class User extends Model {
    
    function __construct()
    {
        $this->table = 'users';
        parent::__construct();
    }

}

?>