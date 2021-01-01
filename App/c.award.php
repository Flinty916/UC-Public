<?php

namespace UnitCommander;

use Exception;
use GuzzleHttp\Client;

class Award extends Model {

    public function __construct()
    {
        try {
            parent::__construct('awards');
        } catch (Exception $exception) {
            return "Error: " . $exception->getMessage();
        }
    }


}