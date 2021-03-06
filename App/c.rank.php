<?php

namespace UnitCommander;

use Exception;
use GuzzleHttp\Client;

class Rank extends Model
{
    public function __construct()
    {
        try {
            parent::__construct('ranks');
        } catch (Exception $exception) {
            return "Error: " . $exception->getMessage();
        }
    }
}