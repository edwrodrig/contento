<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 20-03-18
 * Time: 15:27
 */

use edwrodrig\contento\collection\json\Collection;
use PHPUnit\Framework\TestCase;

class CollectionElement {
    public static function create_from_array(array $data) {
        $o = new self;
        $o->id = $data['id'];
        $o->name = $data['name'];
        return $o;
    }

    public function get_id() : string {
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

        $collection = Collection::create_from_array($data, CollectionElement::class);

        $this->assertEquals(2, count($collection));
        $this->assertEquals('edwin', $collection['0']->name);
        $this->assertEquals('edgar', $collection['1']->name);

        $array = iterator_to_array($collection);
        $this->assertEquals(['0', '1'], array_keys($array));

        $collection->reverse_sort();
        $array = iterator_to_array($collection);
        $this->assertEquals(['1', '0'], array_keys($array));


    }

    public function testCreateFromElements() {
        $data = [
            CollectionElement::create_from_array([
                'id' => '0',
                'name' => 'edwin'
            ]),
            CollectionElement::create_from_array([
                'id' => '1',
                'name' => 'edgar'
            ])
        ];

        $collection = Collection::create_from_elements($data);

        $this->assertEquals(2, count($collection));
        $this->assertEquals('edwin', $collection['0']->name);
        $this->assertEquals('edgar', $collection['1']->name);

        $array = iterator_to_array($collection);
        $this->assertEquals(['0', '1'], array_keys($array));

        $collection->reverse_sort();
        $array = iterator_to_array($collection);
        $this->assertEquals(['1', '0'], array_keys($array));

    }
}
