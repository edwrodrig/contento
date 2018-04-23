<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 21-03-18
 * Time: 17:16
 */

use edwrodrig\contento\type\DateDuration;

class DurableCollectionTest extends \PHPUnit\Framework\TestCase
{

    public function testDurableCollection() {
        $collection = new class implements ArrayAccess, Countable
        {
            use \edwrodrig\contento\type\DurableCollection;

            public function __construct() {
                $this->elements = [
                    self::create_date('1900-01-01', '1910-01-01'),
                    self::create_date('1910-01-01', '1920-01-01'),
                    self::create_date('1920-01-01', '1930-01-01'),
                    self::create_date('1930-01-01', '1940-01-01'),
                ];

                $this->sort();
            }

            public static function create_date(string $a, string $b) {
                return new class ($a, $b) {
                    use \edwrodrig\contento\type\Durable;

                    /**
                     *  constructor.
                     * @param string $a
                     * @param string $b
                     * @throws \edwrodrig\contento\type\exception\InvalidDateDurationException
                     */
                    public function __construct(string $a, string $b) {
                        $this->duration = new DateDuration(
                            DateTime::createFromFormat('Y-m-d',$a),
                            DateTime::createFromFormat('Y-m-d',$b)
                        );
                    }
                };
            }

        };

        $this->assertEquals(4, count($collection));

        $sub = $collection->get_finished_elements(DateTime::createFromFormat('Y-m-d', '1925-01-01'));
        $this->assertEquals(2, count($sub));

        $sub = $collection->get_active_elements(DateTime::createFromFormat('Y-m-d', '1925-01-01'));
        $this->assertEquals(1, count($sub));

        $this->assertEquals($collection[3]->get_duration()->get_start(), $collection[-1]->get_duration()->get_start());
        $this->assertEquals($collection[2]->get_duration()->get_start(), $collection[-2]->get_duration()->get_start());
        $this->assertEquals($collection[1]->get_duration()->get_start(), $collection[-3]->get_duration()->get_start());
        $this->assertEquals($collection[0]->get_duration()->get_start(), $collection[-4]->get_duration()->get_start());

        $sub = $collection->get_started_elements(DateTime::createFromFormat('Y-m-d', '1925-01-01'));
        $this->assertEquals(3, count($sub));

        $this->assertEquals(DateTime::createFromFormat('Y-m-d', '1900-01-01'), $collection->get_start());
        $this->assertEquals(DateTime::createFromFormat('Y-m-d', '1940-01-01'), $collection->get_end());
    }



}
