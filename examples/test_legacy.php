<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 27-03-18
 * Time: 12:01
 */

use edwrodrig\contento\collection\Legacy;

include_once __DIR__ . '/../vendor/autoload.php';

class Element {

    public $data;
    public static function create_from_array(array $data) {
        $e = new self;
        $e->data = $data;
        return $e;
    }

    public function get_id() {
        return $this->data['id'];
    }
}

$credentials = json_decode(file_get_contents('/home/edwin/credential.json'), true);

$c = new Legacy($credentials['endpoint']);
$c->login($credentials['user'], $credentials['pass']);

$collection = $c->get_data('icm_academic_programs', Element::class);

//$collection =  $c->get_images();


var_dump($collection);