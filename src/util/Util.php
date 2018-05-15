<?php
declare(strict_types=1);

namespace edwrodrig\contento\util;

use DateTime;
use edwrodrig\contento\Error;
use Exception;

class Util
{
    /**
     * Creates or null.
     *
     * Try too create an element of some class with value. In other case returns null.
     * @param $value
     * @param string $class_name
     * @return null
     */
    public static function createOrNull(&$value, string $class_name) : ?object {
        if ( isset($value) ) {
            try {
                return new $class_name($value);
            } catch ( Error | Exception $e) {
                return null;
            }
        } else {
            return null;
        }
    }

    /**
     * Create a date from string
     *
     * Useful to create DateTime objects from strings.
     * Dates must be in YYYY-MM-DD format or null
     * @param null|string $date
     * @return DateTime|null
     */
    public static function createDateFromString(?string $date) : ?DateTime {
            if ( is_null($date) )
                return null;
            return DateTime::createFromFormat('Y-m-d', $date);
    }
}