<?php

namespace UnitCommander;

use Exception;

class Training extends Model {

    public function __construct()
    {
        try {
            parent::__construct('training');
        } catch (Exception $exception) {
            return "Error: " . $exception->getMessage();
        }
    }

}