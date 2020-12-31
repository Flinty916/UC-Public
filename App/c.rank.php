<?php

namespace UnitCommander;

use Exception;
use GuzzleHttp\Client;

class Rank
{

    private $request = null;
    public $all = [];

    public function __construct()
    {
        try {
            $this->request = new Client([
                'base_uri' => UC_LINK . '/api/'
            ]);
            foreach ($this->all() as $rank)
                $this->all[$rank->id] = $rank;
        } catch (Exception $exception) {
            return "Error: " . $exception;
        }
    }

    protected function all()
    {
        try {
            return json_decode((string)$this->request->get('ranks')->getBody());
        } catch (Exception $exception) {
            return 'Error: ' . $exception->getCode();
        }
    }

    public function single($rank)
    {
        if (is_integer($rank) && array_key_exists($rank, $this->all)) {
            return $this->getRank($rank);
        } elseif (is_string($rank)) {
            foreach ($this->all as $r)
                if (strtolower($r->name) == strtolower($rank) || strtolower($r->prefix) == strtolower($rank))
                    return $this->getRank($r->id);
        } else
            return null;
    }

    protected function getRank($rank)
    {
        try {
            return json_decode((string)$this->request->get('ranks/' . $rank)->getBody());
        } catch (Exception $exception) {
            return "Error: " . $exception->getCode();
        }
    }

}