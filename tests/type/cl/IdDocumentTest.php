<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 21-03-18
 * Time: 13:41
 */

namespace test\edwrodrig\contento\type\cl;

use edwrodrig\contento\type\cl\IdDocument;
use PHPUnit\Framework\TestCase;

class IdDocumentTest extends TestCase
{
    public function testIdDocument() {
        $doc = IdDocument::createFromArray(['type' => 'rut', 'number' => '16.036.959-K']);
        $this->assertEquals('rut', $doc->getType());
        $this->assertEquals('16036959-k', $doc->getNumber());

        $this->assertJsonStringEqualsJsonString('{"type": "rut", "number": "16036959-k"}', json_encode($doc));
    }

    /**
     * @expectedException edwrodrig\contento\type\exception\InvalidEnumerationValueException
     * @expectedExceptionMessage IdDocumentType [wachulin]
     */
    public function testIdDocumentInvalid() {
        $doc = IdDocument::createFromArray(['type' => 'wachulin', 'number' => '16.036.959-K']);
    }

    /**
     * @expectedException edwrodrig\contento\type\exception\InvalidEnumerationValueException
     * @expectedExceptionMessage IdDocumentType []
     */
    public function testIdDocumentInvalid2() {
        $doc = IdDocument::createFromArray(['number' => '16.036.959-K']);
    }

    /**
     * @expectedException edwrodrig\contento\type\cl\exception\InvalidIdDocumentNumberException
     * @expectedExceptionMessage 16036959-a
     */
    public function testIdDocumentInvalid3() {
        $doc = IdDocument::createFromArray(['type' => 'rut', 'number' => '16.036.959-a']);
    }

    /**
     * @expectedException edwrodrig\contento\type\cl\exception\InvalidIdDocumentNumberException
     * @expectedExceptionMessage 16036959-a
     */
    public function testIdDocumentInvalid4() {
        $doc = IdDocument::createFromArray(['type' => 'rut', 'number' => '16.036.959-a']);
    }
}
