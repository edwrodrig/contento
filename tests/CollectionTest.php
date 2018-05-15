<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 20-03-18
 * Time: 15:27
 */

use edwrodrig\contento\collection\Collection;
use PHPUnit\Framework\TestCase;

class CollectionElement {
    public static function createFromArray(array $data) {
        $o = new self;
        $o->id = $data['id'];
        $o->name = $data['name'];
        return $o;
    }

    public function getId() : string {
        return $this->id;
    }

    public static function compare($a, $b) {
        return $a->id <=> $b->id;
    }
}

class CollectionTest extends TestCase
{
    public function testCollection() {
        $data = [
            [
                'id' => '0',
                'name' => 'edwin'
            ],
            [
                'id' => '1',
                'name' => 'edgar'
            ]
        ];

        $collection = Collection::createFromArray($data, CollectionElement::class);

        $this->assertEquals(2, count($collection));
        $this->assertEquals('edwin', $collection->getElement('0')->name);
        $this->assertEquals('edgar', $collection->getElement('1')->name);

        $array = iterator_to_array($collection);
        $this->assertEquals(['0', '1'], array_keys($array));

        $collection->reverseSort();
        $array = iterator_to_array($collection);
        $this->assertEquals(['1', '0'], array_keys($array));


    }

    public function testCreateFromElements() {
        $data = [
            CollectionElement::createFromArray([
                'id' => '0',
                'name' => 'edwin'
            ]),
            CollectionElement::createFromArray([
                'id' => '1',
                'name' => 'edgar'
            ])
        ];

        $collection = Collection::createFromElements($data);

        $this->assertEquals(2, count($collection));
        $this->assertEquals('edwin', $collection->getElement('0')->name);
        $this->assertEquals('edgar', $collection->getElement('1')->name);

        $array = iterator_to_array($collection);
        $this->assertEquals(['0', '1'], array_keys($array));

        $collection->reverseSort();
        $array = iterator_to_array($collection);
        $this->assertEquals(['1', '0'], array_keys($array));

    }
}
