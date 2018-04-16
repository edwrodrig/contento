<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-04-18
 * Time: 15:34
 */

use edwrodrig\contento\type\DefaultElement;
use PHPUnit\Framework\TestCase;

class DefaultElementTest extends TestCase
{
    function testCreateFromArray() {
        $e = DefaultElement::create_from_array([
            'id' => 'hola',
            'name' => 'edwin'
        ]);

        $this->assertEquals('hola',$e->get_id());
        $this->assertEquals('edwin',$e->get_name());
    }

    function testNotExistantId() {
        $e = DefaultElement::create_from_array([
            'name' => 'edwin'
        ]);

        $this->assertInternalType('string', $e->get_id());
    }

    function testNotExistantProperty() {
        $e = DefaultElement::create_from_array([
            'name' => 'edwin'
        ]);

        $this->assertNull($e->get_hola());
    }
}
