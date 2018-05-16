<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 27-03-18
 * Time: 12:01
 */

use edwrodrig\contento\collection\legacy\Collection;

include_once __DIR__ . '/../vendor/autoload.php';

class Element {

    public $data;
    public static function createFromArray(array $data) {
        $e = new self;
        $e->data = $data;
        return $e;
    }

    public function getId() {
        return $this->data['id'];
    }
}

$credentials = json_decode(file_get_contents('/home/edwin/credential.json'), true);

$c = new Collection($credentials['endpoint']);
$c->login($credentials['user'], $credentials['pass']);

$collection = $c->getCollection('icm_academic_programs', Element::class);

//$collection =  $c->get_images();


var_dump($collection);