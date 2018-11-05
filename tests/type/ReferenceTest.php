<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 05-11-18
 * Time: 16:43
 */

namespace test\edwrodrig\contento\type;

use edwrodrig\contento\collection\Collection;
use PHPUnit\Framework\TestCase;
use test\edwrodrig\contento\DefaultReference;

class ReferenceTest extends TestCase
{
    function testCreateFromArray() {
        $data = [
            [
            'id' => 'hola',
            'name' => 'edwin'
            ]
        ];

        $collection = Collection::createFromArray($data);

        DefaultReference::setCollection($collection);

        $reference = new DefaultReference('hola');

        $element = $reference->getElement();
        $this->assertEquals('hola',$element->getId());
        $this->assertEquals('edwin',$element->getData()['name']);
    }
}
