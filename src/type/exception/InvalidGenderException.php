<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 15:03
 */

namespace edwrodrig\contento\type\exception;


use Exception;

class InvalidGenderException extends Exception
{

    /**
     * InvalidGenderException constructor.
     * @param null|string $gender
     */
    public function __construct($gender)
    {
        parent::__construct($gender);
    }
}