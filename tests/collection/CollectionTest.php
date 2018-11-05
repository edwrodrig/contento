<?php

namespace test\edwrodrig\contento\collection;

use edwrodrig\contento\collection\Collection;
use PHPUnit\Framework\TestCase;
use test\edwrodrig\contento\CollectionElement;

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
        $this->assertNull($collection->getElementOrDefault('2'));
        $this->assertNull($collection->getElementOrDefault('2', null));
        $this->assertEquals('hola', $collection->getElementOrDefault('2', 'hola'));

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

    public function testCreateFiltered() {
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

        $filtered_collection = $collection->createFiltered(function(CollectionElement $element) { return $element->getId() == '0'; });

        $this->assertEquals(1, count($filtered_collection));
        $this->assertEquals('edwin', $filtered_collection->getElement('0')->name);

        $filtered_collection = $collection->createFiltered(function(CollectionElement $element) { return $element->getId() == '1'; });

        $this->assertEquals(1, count($filtered_collection));
        $this->assertEquals('edgar', $filtered_collection->getElement('1')->name);
    }

    public function testCreateOrganized() {
        $data = [
            CollectionElement::createFromArray([
                'id' => '0',
                'name' => 'edwin'
            ]),
            CollectionElement::createFromArray([
                'id' => '1',
                'name' => 'edgar'
            ]),
            CollectionElement::createFromArray([
                'id' => '2',
                'name' => 'amanda'
            ])
        ];

        $collection = Collection::createFromElements($data);

        $organized_collection = $collection->createOrganized(function(CollectionElement $element) { return substr($element->name, 0, 2); });

        $this->assertEquals(2, count($organized_collection));
        $this->assertEquals(2, count($organized_collection['ed']));
        $this->assertEquals(1, count($organized_collection['am']));

    }

    public function testCreateOrganized2() {
        $data = [
            CollectionElement::createFromArray([
                'id' => '0',
                'name' => 'edwin'
            ]),
            CollectionElement::createFromArray([
                'id' => '1',
                'name' => 'edgar'
            ]),
            CollectionElement::createFromArray([
                'id' => '2',
                'name' => 'amanda'
            ])
        ];

        $collection = Collection::createFromElements($data);

        $organized_collection = $collection->createOrganized(function(CollectionElement $element) { return [substr($element->name, 0, 2), 'all']; });

        $this->assertEquals(3, count($organized_collection));
        $this->assertEquals(2, count($organized_collection['ed']));
        $this->assertEquals(1, count($organized_collection['am']));
        $this->assertEquals(3, count($organized_collection['all']));

    }

    public function testCreateOrganized3() {
        $data = [
            CollectionElement::createFromArray([
                'id' => '0',
                'name' => 'edwin'
            ]),
            CollectionElement::createFromArray([
                'id' => '1',
                'name' => 'edgar'
            ]),
            CollectionElement::createFromArray([
                'id' => '2',
                'name' => 'amanda'
            ])
        ];

        $collection = Collection::createFromElements($data);

        $organized_collection = $collection->createOrganized(function(CollectionElement $element) { return $element->name[0] == 'e' ? 'e' : []; });

        $this->assertEquals(2, count($organized_collection));
        $this->assertEquals(2, count($organized_collection['e']));
        $this->assertEquals(1, count($organized_collection['without classification']));

    }
}
