<?php

namespace UnitCommander;

use Exception;
use GuzzleHttp\Client;

class Profile {

    private $request;
    private $sid;
    public $name;
    public $nickname;
    public $avatar;
    public $steam_url;
    public $rank;
    public $awards;
    public $training;
    public $units;
    public $positions;

    public function __construct($sid) {
        try {
            $this->request = new Client([
                'base_uri' => UC_LINK . '/api/'
            ]);
            if(is_integer($sid)) {
                $this->sid = $sid;
                if($profile = $this->fetch()) {
                    $this->name = $profile->name;
                    $this->nickname = $profile->nickname;
//                $this->avatar = $profile->avatar;
                    $this->steam_url = $profile->steam_profile;
                    $this->rank = $profile->rank;
                    $this->awards = $profile->awards;
                    $this->training = $profile->training;
                    $this->units = $profile->units;
                    $this->positions = $profile->positions;
                }
                else
                    throw new Exception('Profile Not Available');
            }
        } catch(Exception $exception) {
            echo $exception->getMessage();
        }
    }

    protected function fetch() {
        try {
            $result = $this->request->get('profiles/sid/' . $this->sid);
            return json_decode((string)$result->getBody());
        } catch (Exception $exception) {
            return null;
        }
    }

}