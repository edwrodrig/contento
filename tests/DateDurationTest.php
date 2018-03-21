<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 21-03-18
 * Time: 17:16
 */

use edwrodrig\contento\type\DateDuration;

class DateDurationTest extends \PHPUnit\Framework\TestCase
{

    public static function create_date($string) {
        if ( is_null($string) )
            return null;
        return DateTime::createFromFormat('Y-m-d', $string);
    }

    public function compareProvider() {
        return [
            [0, [null, null], [null, null]],
            [1, [null, null], ['1990-01-01', null]],
            [0, ['1990-01-01', null], ['1990-01-01', null]],
            [-1, ['1990-01-01', null], [null, null]],
            [1, [null, '1990-01-01'], ['1990-01-01', null]],
            [1, [null, '1990-01-02'], ['1990-01-01', null]],
            [1, [null, '1990-01-01'], ['1990-01-02', null]],
            [-1, ['1990-01-01', null], [null,'1990-01-01']],
            [-1, ['1990-01-01', null], [null,'1990-01-02']],
            [-1, ['1990-01-02', null], [null,'1990-01-01']],
        ];
    }

    /**
     * @param $expected
     * @param $a
     * @param $b
     * @throws \edwrodrig\contento\type\exception\InvalidDateDurationException
     * @dataProvider compareProvider
     */
    public function testCompare($expected, $a, $b)
    {

        $duration_1 = new DateDuration(self::create_date($a[0]), self::create_date($a[1]));
        $duration_2 = new DateDuration(self::create_date($b[0]), self::create_date($b[1]));
        $this->assertEquals($expected, DateDuration::compare($duration_1, $duration_2));
    }



}
