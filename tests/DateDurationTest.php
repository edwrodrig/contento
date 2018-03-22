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

    public static function create_duration($a, $b) {
        return new DateDuration(self::create_date($a), self::create_date($b));
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

        $duration_1 = self::create_duration(...$a);
        $duration_2 = self::create_duration(...$b);
        $this->assertEquals($expected, DateDuration::compare($duration_1, $duration_2));
    }

    public function isActiveProvider() {
        return [
            [true, [null, null], self::create_duration(null, null)],
            [true, ['1990-01-01', '2000-01-01'], self::create_duration('1999-01-01', '2001-01-01')],
            [true, ['1990-01-01', '2000-01-01'], self::create_duration('1989-01-01', '2001-01-01')],
            [false, ['1990-01-01', '2000-01-01'], self::create_duration('2001-01-01', '2002-01-01')],
        ];
    }

    /**
     * @param $expected
     * @param $a
     * @param $b
     * @dataProvider isActiveProvider
     */
    public function testIsActive($expected, $a, $b) {
        $duration_1 = self::create_duration(...$a);

        $this->assertEquals($expected, $duration_1->is_active($b));
    }



}
