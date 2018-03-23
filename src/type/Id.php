<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 14:05
 */

namespace edwrodrig\contento\type;

use JsonSerializable;

class Id implements JsonSerializable
{
    private $id;

    public function __construct(string $id) {
        $this->id = $id;
    }

    public static function create_new(string $id) : self {
        $id = strtr(utf8_decode($id), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');


        $id = preg_replace('/[^a-zA-Z0-9-_,\s]/', '', strtolower($id));
        $id = preg_replace('/[\s,_-]+/', '-', $id);
        $id = preg_replace('/^-/', '', $id);
        $id = preg_replace('/-$/', '', $id);

        return new self($id);
    }

    public function __toString() : string {
        return $this->id;
    }

    public function jsonSerialize() {
        return $this->id;
    }
}