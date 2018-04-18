<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 18-04-18
 * Time: 12:35
 */

use edwrodrig\contento\type\Enumeration;
use PHPUnit\Framework\TestCase;

class Enum extends Enumeration {
    const H = '1';
    const V = '2';
}

class EnumerationTest extends TestCase
{
    public function testBasic() {
        $this->assertInstanceOf(Enumeration::class, new Enum(1));
        $this->assertInstanceOf(Enumeration::class, new Enum(2));
    }

    /**
     * @expectedException edwrodrig\contento\type\exception\InvalidEnumerationValueException
     * @expectedExceptionMessage hola
     *
     */
    public function testException() {
        new Enum('hola');
    }
}
