<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 14:46
 */

namespace edwrodrig\contento\type\exception;


class InvalidMailException extends \Exception
{

    /**
     * InvalidMailException constructor.
     * @param bool $mail
     */
    public function __construct($mail)
    {
        parent::__construct($mail);
    }
}