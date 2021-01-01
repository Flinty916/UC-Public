<?php

namespace UnitCommander;

use Exception;
use GuzzleHttp\Client;

class Model {

    protected $type;
    private $request = null;
    public $all = [];
    public $allGroups = [];

    public function __construct($type)
    {
        try {
            $this->type = $type;
            $this->request = new Client([
                'base_uri' => UC_LINK . '/api/'
            ]);
            foreach ($this->all() as $item)
                $this->all[$item->id] = $item;
            if($groups = $this->allGroups() && is_array($this->allGroups()))
                foreach ($this->allGroups() as $group)
                    $this->allGroups[] = $group;
        } catch (Exception $exception) {
            return "Error: " . $exception->getMessage();
        }
    }

    protected function all()
    {
        try {
            return json_decode((string)$this->request->get($this->type)->getBody());
        } catch (Exception $exception) {
            return 'Error: ' . $exception->getCode();
        }
    }

    protected function allGroups() {
        try {
            return json_decode((string)$this->request->get($this->type.'/groups')->getBody());
        } catch (Exception $exception) {
            return 'Error: ' . $exception->getCode();
        }
    }

    public function single($item)
    {
        if (is_integer($item) && array_key_exists($item, $this->all)) {
            return $this->getSingle($item);
        } elseif (is_string($item)) {
            foreach ($this->all as $i)
                if (strtolower($i->name) == strtolower($item) || strtolower($i->prefix) == strtolower($item))
                    return $this->getSingle($i->id);
        } else
            return null;
    }

    protected function getSingle($item)
    {
        try {
            return json_decode((string)$this->request->get($this->type.'/'.$item)->getBody());
        } catch (Exception $exception) {
            return "Error: " . $exception->getCode();
        }
    }

}