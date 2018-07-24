<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 21-03-18
 * Time: 16:40
 */

namespace edwrodrig\contento\type;

use JsonSerializable;

class Reference implements JsonSerializable
{
    private $ref;

    private $type;

    public function __construct(string $type, string $ref) {
        $this->type = $type;
        $this->ref = $ref;
    }

    public function getRef() : string {
        return $this->ref;
    }

    public function getType() : string {
        return $this->type;
    }

    public function jsonSerialize() {
        return $this->ref;
    }
}