<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 15:20
 */

namespace edwrodrig\contento\type\exception;


use Exception;

class InvalidUrlException extends Exception
{

    /**
     * InvalidUrlException constructor.
     * @param string $url
     */
    public function __construct($url)
    {
        parent::__construct($url);
    }
}