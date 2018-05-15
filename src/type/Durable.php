<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 22-03-18
 * Time: 7:32
 */

namespace edwrodrig\contento\type;

/**
 * Trait Durable
 *
 * Use this when an element has duration.
 * @package edwrodrig\contento\type
 */
trait Durable
{
    /**
     * The duration of the element.
     * @var DateDuration
     */
    protected $duration;


    /**
     * Get the duration.
     * @return DateDuration
     */
    public function getDuration() : DateDuration {
        return $this->duration;
    }
}