<?php

namespace App\Models;

use App\DB\Database;

class TruckSchedule extends Model {
    
    function __construct()
    {
        $this->table = 'truck_shedules';
        parent::__construct();
    }

}

?>