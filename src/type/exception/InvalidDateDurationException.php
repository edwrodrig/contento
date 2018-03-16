<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 14:26
 */

namespace edwrodrig\contento\type\exception;

use Exception;

class InvalidDateDurationException extends Exception
{

    /**
     * InvalidDateDurationException constructor.
     * @param Date $start
     * @param Date $end
     */
    public function __construct(Date $start, Date $end)
    {
        parent::__construct(sprintf("[%s][%s]", $start->format('Y-m-d H:i:s'), $end->format('Y-m-d H:i:s')));
    }
}