<?php

namespace UnitCommander;

use Exception;

class Unit extends Model {

    public function __construct()
    {
        try {
            parent::__construct('units');
        } catch (Exception $exception) {
            return "Error: " . $exception->getMessage();
        }
    }

}