<?php

namespace App\Models;

use App\DB\Database;

class TruckLocation extends Model {
    
    function __construct()
    {
        $this->table = 'truck_locations';
        parent::__construct();
    }

}

?>