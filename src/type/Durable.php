<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 22-03-18
 * Time: 7:32
 */

namespace edwrodrig\contento\type;


trait Durable
{
    /**
     * @var DateDuration
     */
    protected $duration;


    public function get_duration() : DateDuration {
        return $this->duration;
    }
}