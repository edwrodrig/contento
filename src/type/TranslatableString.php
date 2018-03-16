<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 13:45
 */

namespace edwrodrig\contento\type;


class TranslatableString
{
    private $strings;

    public function __construct(string $string) {
        $this->strings = $string;
    }

    public function from_array() : array {
        return $this->strings;
    }

}