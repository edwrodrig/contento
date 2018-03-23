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

    public function has_started($now = null) : bool {
        if ( is_null($now) )
            $now = new DateTime;
        
        if ( $now instanceof DateTime )
            $now = $now->getTimestamp();
        else if ( $now instanceof DateDuration )
            $now = $now->get_end_timestamp();
        
        return $this->get_start_timestamp() < $now;
            
    }

    public function has_finished($now = null) : bool {
        if ( is_null($now) )
            $now = new DateTime;

        if ( $now instanceof DateTime )
            $now = $now->getTimestamp();
        else if ( $now instanceof DateDuration )
            $now = $now->get_end_timestamp();

        return $this->get_end_timestamp() < $now;

    }
    
    public function is_active($now = null) : bool {
        if ( is_null($now) )
            $now = new DateTime;

        if ( $now instanceof DateTime )
            return $this->has_started($now) && !$this->has_finished($now);

        if ( $now instanceof DateDuration )
            return $this->has_started($now->get_end_timestamp()) && !$this->has_finished($now->get_start_timestamp());

        return false;
    }

    public function get_start() : ?DateTime {
        return $this->start;
    }

    public function get_end() : ?DateTime {
        return $this->end;
    }

    public function get_start_timestamp() : int {
        return is_null($this->start) ? PHP_INT_MIN : $this->start->getTimestamp();
    }

    public function get_end_timestamp() : int {
        return is_null($this->end) ? PHP_INT_MAX : $this->end->getTimestamp();
    }
    
    public static function compare(DateDuration $a, DateDuration $b)
    {
        $a1 = $a->get_start_timestamp();
        $a2 = $a->get_end_timestamp();

        $b1 = $b->get_start_timestamp();
        $b2 = $b->get_end_timestamp();

        if ( $a2 < $b1 ) return 1;
        if ( $b2 < $a1 ) return -1;

        if ( $a2 < $b2 ) return 1;
        if ( $b2 < $a2 ) return -1;

        if ( $a1 < $b1 ) return 1;
        if ( $b1 < $a1 ) return -1;

        return 0;
    }


}