<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 13:37
 */

namespace edwrodrig\contento\type;
use DateTime;

/**
 * Class DateDuration
 * @package edwrodrig\contento\data\type
 * @contento_label_es duración
 * @contento_label_en duration
 */
class DateDuration
{
    /**
     * @var Date|null
     * @contento_label_es fecha de inicio
     * @contento_label_en start date
     */
    private $start;

    /**
     * @var Date|null
     * @contento_label_es fecha de término
     * @contento_label_en end date
     */
    private $end;


    /**
     * DateDuration constructor.
     * @param DateTime|null $start
     * @param DateTime|null $end
     * @throws exception\InvalidDateDurationException
     */
    public function __construct(?DateTime $start = null, ?DateTime $end = null) {
        $this->start = $start;
        $this->end = $end;

        if ( is_null($start) || is_null($end) ) return;

        if ( $start > $end )
            throw new exception\InvalidDateDurationException($start, $end);
    }

    public function to_array() : array {
        return [
            'start' => $this->start,
            'end' => $this->end
        ];
    }

    public function has_started(?DateTime $now = null) : bool {
        if ( is_null($now) )
            $now = new DateTime;
        if ( is_null($this->start) )
            return true;
        return $this->start < $now;
    }

    public function has_finished(?DateTime $now = null) : bool {
        if ( is_null($now) )
            $now = new DateTime;

        if ( is_null($this->end) )
            return false;

        return $this->end < $now;
    }

    public function is_active(?DateTime $now = null) : bool {
        if ( is_null($now) )
            $now = new DateTime;

        return $this->has_started($now) && !$this->has_finished($now);
    }

    public static function compare(DateDuration $a, DateDuration $b)
    {
        $a1 = is_null($a->start) ? PHP_INT_MIN : $a->start->getTimestamp();
        $a2 = is_null($a->end) ? PHP_INT_MAX : $a->end->getTimestamp();

        $b1 = is_null($b->start) ? PHP_INT_MIN : $b->start->getTimestamp();
        $b2 = is_null($b->end) ? PHP_INT_MAX : $b->end->getTimestamp();

        if ( $a2 < $b1 ) return 1;
        if ( $b2 < $a1 ) return -1;

        if ( $a2 < $b2 ) return 1;
        if ( $b2 < $a2 ) return -1;

        if ( $a1 < $b1 ) return 1;
        if ( $b1 < $a1 ) return -1;

        return 0;
    }



}