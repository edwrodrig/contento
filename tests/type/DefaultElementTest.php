<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-04-18
 * Time: 15:34
 */

namespace test\edwrodrig\contento\type;

use edwrodrig\contento\type\DefaultElement;
use PHPUnit\Framework\TestCase;

class DefaultElementTest extends TestCase
{
    function testCreateFromArray() {
        $e = DefaultElement::createFromArray([
            'id' => 'hola',
            'name' => 'edwin'
        ]);

        $this->assertEquals('hola',$e->getId());
        $this->assertEquals('edwin',$e->getData()['name']);
    }

    function testNotExistantId() {
        $e = DefaultElement::createFromArray([
            'name' => 'edwin'
        ]);

        $this->assertInternalType('string', $e->getId());
    }
}
