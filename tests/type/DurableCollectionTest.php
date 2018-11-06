<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 21-03-18
 * Time: 17:16
 */

namespace test\edwrodrig\contento\type;

use ArrayAccess;
use Countable;
use edwrodrig\contento\type\DateDuration;
use edwrodrig\contento\type\DurableCollection;
use edwrodrig\contento\type\exception\InvalidDateDurationException;
use edwrodrig\contento\util\Util;

class DurableCollectionTest extends \PHPUnit\Framework\TestCase
{
    public function testDurableCollection() {
        /**
         * @var DurableCollection
         */
        $collection = new class extends DurableCollection
        {

            public function __construct() {
                $this->elements = [
                    self::createDate('1900-01-01', '1910-01-01'),
                    self::createDate('1910-01-01', '1920-01-01'),
                    self::createDate('1920-01-01', '1930-01-01'),
                    self::createDate('1930-01-01', '1940-01-01'),
                ];

                $this->sort();
            }

            public static function createDate(string $a, string $b) {
                return new class ($a, $b) {
                    use \edwrodrig\contento\type\Durable;

                    /**
                     *  constructor.
                     * @param string $a
                     * @param string $b
                     * @throws InvalidDateDurationException
                     */
                    public function __construct(string $a, string $b) {
                        $this->duration = DateDuration::createFromString($a, $b);
                    }
                };
            }

        };

        $this->assertEquals(4, count($collection));

        $sub = $collection->getFinishedElements(Util::createDateFromString('1925-01-01'));
        $this->assertEquals(2, count($sub));

        $sub = $collection->getActiveElements(Util::createDateFromString('1925-01-01'));
        $this->assertEquals(1, count($sub));

        $this->assertEquals($collection[3]->getDuration()->getStart(), $collection[-1]->getDuration()->getStart());
        $this->assertEquals($collection[2]->getDuration()->getStart(), $collection[-2]->getDuration()->getStart());
        $this->assertEquals($collection[1]->getDuration()->getStart(), $collection[-3]->getDuration()->getStart());
        $this->assertEquals($collection[0]->getDuration()->getStart(), $collection[-4]->getDuration()->getStart());

        $sub = $collection->getStartedElements(Util::createDateFromString('1925-01-01'));
        $this->assertEquals(3, count($sub));

        $this->assertEquals(Util::createDateFromString('1900-01-01'), $collection->getStart());
        $this->assertEquals(Util::createDateFromString('1940-01-01'), $collection->getEnd());

        $this->assertEquals(Util::createDateFromString('1900-01-01'), $collection->getFirst()->getDuration()->getStart());
        $this->assertEquals(Util::createDateFromString('1940-01-01'), $collection->getLast()->getDuration()->getEnd());
    }



}
