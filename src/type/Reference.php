<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 21-03-18
 * Time: 16:40
 */

namespace edwrodrig\contento\type;


class Reference
{
    private $ref;

    private $type;

    public function __construct(string $type, string $ref) {
        $this->type = $type;
        $this->ref = $ref;
    }

    public function get_ref() : string {
        return $this->ref;
    }

    public function get_type() : string {
        return $this->type;
    }
}