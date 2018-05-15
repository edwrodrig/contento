<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 14:26
 */

namespace edwrodrig\contento\type\exception;

use DateTime;
use Exception;

class InvalidDateDurationException extends Exception
{

    /**
     * InvalidDateDurationException constructor.
     * @param DateTime $start
     * @param DateTime $end
     */
    public function __construct(DateTime $start, DateTime $end)
    {
        parent::__construct(sprintf("[%s][%s]", $start->format('Y-m-d H:i:s'), $end->format('Y-m-d H:i:s')));
    }
}