<?php

namespace UnitCommander;

use Exception;

class Position extends Model {

    public function __construct()
    {
        try {
            parent::__construct('positions');
        } catch (Exception $exception) {
            return "Error: " . $exception->getMessage();
        }
    }

}