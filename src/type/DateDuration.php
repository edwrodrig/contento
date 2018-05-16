<?php
declare(strict_types=1);

namespace edwrodrig\contento\type;

use DateTime;
use edwrodrig\contento\util\Util;

/**
 * Class DateDuration
 *
 * Define a duration
 * @package edwrodrig\contento\data\type
 * @contento_label_es duración
 * @contento_label_en duration
 */
class DateDuration
{
    /**
     * The start of the duration.
     *
     * It is always before the {@see DateDuration::$end}.
     * If this value is null then means that has not start, begins with big bang or something like that.
     * @var DateTime|null
     * @contento_label_es fecha de inicio
     * @contento_label_en start date
     */
    private $start;

    /**
     * The end of the duration
     *
     * It is always after the {@see DateDuration::$start}.
     * If this value is null then means that has not end, end with the end of universe.
     *
     * @var DateTime|null
     * @contento_label_es fecha de término
     * @contento_label_en end date
     */
    private $end;


    /**
     * DateDuration constructor.
     * @uses DateDuration::$start
     * @uses DateDuration::$end
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

    /**
     * Get array representation.
     *
     * Return an array with start and end keys.
     * Thi is handy for serialization
     * @return array
     */
    public function toArray() : array {
        return [
            'start' => $this->start,
            'end' => $this->end
        ];
    }

    /**
     * Set the duration as a year.
     *
     * The start is the first day of the year and the end the last one.
     * Very convenient to generate a year range.
     * @param int $year
     * @return DateDuration
     */
    public function setYear(int $year) : DateDuration {
        $this->start = DateTime::createFromFormat('Y-m-d', $year . '-01-01');
        $this->end = DateTime::createFromFormat('Y-m-d', $year . '-12-31');
        return $this;
    }

    /**
     * Has the duration started?
     *
     * @param null|DateTime|DateDuration $now
     * @return bool
     */
    public function hasStarted($now = null) : bool {
        if ( is_null($now) )
            $now = new DateTime;
        
        if ( $now instanceof DateTime )
            $now = $now->getTimestamp();
        else if ( $now instanceof DateDuration )
            $now = $now->getEndTimestamp();
        
        return $this->getStartTimestamp() < $now;
            
    }

    /**
     * Has the duration finished?
     *
     * @param null|DateTime|DateDuration $now
     * @return bool
     */
    public function hasFinished($now = null) : bool {
        if ( is_null($now) )
            $now = new DateTime;

        if ( $now instanceof DateTime )
            $now = $now->getTimestamp();
        else if ( $now instanceof DateDuration )
            $now = $now->getEndTimestamp();

        return $this->getEndTimestamp() < $now;

    }

    /**
     * Is the duration active
     *
     * A duration can have started without being active if is already {@see DateDuration::hasFinished() finished}
     * When now is a {@see DateDuration} this function works as {@see DateDuration::overlaps() overlaps}.
     * @param null $now
     * @return bool
     */
    public function isActive($now = null) : bool {
        if ( is_null($now) )
            $now = new DateTime;

        if ( $now instanceof DateTime )
            return $this->hasStarted($now) && !$this->hasFinished($now);

        if ( $now instanceof DateDuration )
            return $this->overlaps($now);

        return false;
    }

    /**
     * Check if this duration overlaps to another.
     *
     * @param DateDuration $duration
     * @return bool
     */
    public function overlaps(DateDuration $duration) : bool {
        return $this->hasStarted($duration->getEndTimestamp()) && !$this->hasFinished($duration->getStartTimestamp());
    }

    /**
     * Get the start date
     *
     * @return DateTime|null
     */
    public function getStart() : ?DateTime {
        return $this->start;
    }

    /**
     * Get the end date
     *
     * @return DateTime|null
     */
    public function getEnd() : ?DateTime {
        return $this->end;
    }

    /**
     * Get the start timestamp.
     *
     * This is a convenience function.
     * If the end is null returns a {@see PHP_INT_MIN low number}
     * @return int
     */
    public function getStartTimestamp() : int {
        return is_null($this->start) ? PHP_INT_MIN : $this->start->getTimestamp();
    }

    /**
     * Get the end timestamp.
     *
     * This is a convenience function.
     * If the end is null returns a {@see PHP_INT_MAX high number}
     * @return int
     */
    public function getEndTimestamp() : int {
        return is_null($this->end) ? PHP_INT_MAX : $this->end->getTimestamp();
    }


    /**
     * Compare two DateDurations.
     *
     * true if $a < $b
     * @param DateDuration $a
     * @param DateDuration $b
     * @return int
     */
    public static function compare(DateDuration $a, DateDuration $b)
    {
        $a1 = $a->getStartTimestamp();
        $a2 = $a->getEndTimestamp();

        $b1 = $b->getStartTimestamp();
        $b2 = $b->getEndTimestamp();

        if ( $a2 < $b1 ) return -1;
        if ( $b2 < $a1 ) return 1;

        if ( $a2 < $b2 ) return -1;
        if ( $b2 < $a2 ) return 1;

        if ( $a1 < $b1 ) return -1;
        if ( $b1 < $a1 ) return 1;

        return 0;
    }

    /**
     * Create a duration from string dates.
     *
     * Useful when you have serialized dates
     * @uses Util::createDataFromString() to creates dates
     * @param null|string $start
     * @param null|string $end
     * @return DateDuration
     * @throws exception\InvalidDateDurationException
     */
    public static function createFromString(?string $start, ?string $end) : DateDuration {
        return new DateDuration(
            Util::createDateFromString($start),
            Util::createDateFromString($end)
        );
    }

}