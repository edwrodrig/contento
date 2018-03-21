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
}