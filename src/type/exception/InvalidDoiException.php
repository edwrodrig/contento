<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 14:55
 */

namespace edwrodrig\contento\type\exception;


use Exception;

class InvalidDoiException extends Exception
{

    /**
     * InvalidDoiException constructor.
     * @param string $doi
     */
    public function __construct(string $doi)
    {
        parent::__construct($doi);
    }
}