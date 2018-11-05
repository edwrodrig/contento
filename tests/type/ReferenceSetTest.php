<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 05-11-18
 * Time: 17:12
 */

namespace test\edwrodrig\contento\type;

use edwrodrig\contento\collection\Collection;
use PHPUnit\Framework\TestCase;
use test\edwrodrig\contento\DefaultReference;
use test\edwrodrig\contento\DefaultReferenceSet;

class ReferenceSetTest extends TestCase
{
    function testCreateFromArray() {
        $data = [
            [
                'id' => 'hola',
                'name' => 'edwin'
            ],
            [
                'id' => 'chao',
                'name' => 'edgar'
            ]
        ];

        $collection = Collection::createFromArray($data);

        DefaultReference::setCollection($collection);

        $set = DefaultReferenceSet::createFromArray(['hola', 'chao']);

        $references = iterator_to_array($set);

        $element = $references[0]->getElement();
        $this->assertEquals('hola',$element->getId());
        $this->assertEquals('edwin',$element->getData()['name']);

        $element = $references[1]->getElement();
        $this->assertEquals('chao',$element->getId());
        $this->assertEquals('edgar',$element->getData()['name']);
    }
}
