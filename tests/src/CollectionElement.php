<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 05-11-18
 * Time: 16:54
 */

namespace test\edwrodrig\contento;

class CollectionElement {
    public static function createFromArray(array $data) {
        $o = new self;
        $o->id = $data['id'];
        $o->name = $data['name'];
        return $o;
    }

    public function getId() : string {
        return $this->id;
    }

    public static function compare($a, $b) {
        return $a->id <=> $b->id;
    }
}