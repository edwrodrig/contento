<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 21-03-18
 * Time: 17:16
 */

namespace test\edwrodrig\contento\type;

use edwrodrig\contento\type\DateDuration;
use edwrodrig\contento\util\Util;

class DateDurationTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @param $expected
     * @param $a
     * @param $b
     * @throws \edwrodrig\contento\type\exception\InvalidDateDurationException
     * @testWith   [0, [null, null], [null, null]]
     *             [-1, [null, null], ["1990-01-01", null]]
     *             [0, ["1990-01-01", null], ["1990-01-01", null]]
     *             [1, ["1990-01-01", null], [null, null]]
     *             [-1, [null, "1990-01-01"], ["1990-01-01", null]]
     *             [-1, [null, "1990-01-02"], ["1990-01-01", null]]
     *             [-1, [null, "1990-01-01"], ["1990-01-02", null]]
     *             [1, ["1990-01-01", null], [null,"1990-01-01"]]
     *             [1, ["1990-01-01", null], [null,"1990-01-02"]]
     *             [1, ["1990-01-02", null], [null,"1990-01-01"]]
     *             [1, ["1940-01-01", "1941-01-01"], ["1920-01-01", "1921-01-01"]]
     *             [-1, ["1920-01-01", "1921-01-01"], ["1940-01-01", "1941-01-01"]]
     */
    public function testCompare($expected, $a, $b)
    {

        $duration_1 = DateDuration::createFromString(...$a);
        $duration_2 = DateDuration::createFromString(...$b);
        $this->assertEquals($expected, DateDuration::compare($duration_1, $duration_2));
    }


    /**
     * @param $expected
     * @param $a
     * @param $b
     * @testWith  [true, [null, null],[null, null]]
     *            [true, ["1990-01-01", "2000-01-01"], ["1999-01-01", "2001-01-01"]]
     *            [true, ["1990-01-01", "2000-01-01"], ["1989-01-01", "2001-01-01"]]
     *            [false, ["1990-01-01", "2000-01-01"], ["2001-01-01", "2002-01-01"]]
     * @throws \edwrodrig\contento\type\exception\InvalidDateDurationException
     */
    public function testIsActiveByDateDuration($expected, $a, $b) {
        $duration_1 = DateDuration::createFromString(...$a);

        $this->assertEquals($expected, $duration_1->isActive(DateDuration::createFromString(...$b)));
    }

    /**
     * @param $expected
     * @param $a
     * @param $b
     * @testWith    [true, ["1900-01-01", "2000-01-01"], "1950-01-01"]
     *              [false, ["1900-01-01", "2000-01-01"], "2010-01-01"]
     * @throws \edwrodrig\contento\type\exception\InvalidDateDurationException
     */
    public function testIsActiveByDateTime($expected, $a, $b) {
        $duration_1 = DateDuration::createFromString(...$a);

        $this->assertEquals($expected, $duration_1->isActive(Util::createDateFromString($b)));
    }

    public function testCompareSort() {
        $dates = [
            DateDuration::createFromString('1900-01-01', '1901-01-01'),
            DateDuration::createFromString('1920-01-01', '1921-01-01'),
            DateDuration::createFromString('1940-01-01', '1941-01-01'),
        ];

        $dates_2 = [
            DateDuration::createFromString('1900-01-01', '1901-01-01'),
            DateDuration::createFromString('1920-01-01', '1921-01-01'),
            DateDuration::createFromString('1940-01-01', '1941-01-01'),
        ];

        usort($dates_2, function($a, $b) { return DateDuration::compare($a, $b); });

        $this->assertEquals($dates, $dates_2);

    }

    public function testCompareRSort() {

        $dates_1 = [
            DateDuration::createFromString('1940-01-01', '1941-01-01'),
            DateDuration::createFromString('1920-01-01', '1921-01-01'),
            DateDuration::createFromString('1900-01-01', '1901-01-01')
        ];

        $dates_2 = [
            DateDuration::createFromString('1900-01-01', '1901-01-01'),
            DateDuration::createFromString('1920-01-01', '1921-01-01'),
            DateDuration::createFromString('1940-01-01', '1941-01-01')
        ];


        usort($dates_2, function($a, $b) { return DateDuration::compare($b, $a); });

        $this->assertEquals($dates_1, $dates_2);

    }

}
