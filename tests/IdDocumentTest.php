<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 21-03-18
 * Time: 13:41
 */

use edwrodrig\contento\type\cl\IdDocument;
use PHPUnit\Framework\TestCase;

class IdDocumentTest extends TestCase
{
    public function testIdDocument() {
        $doc = IdDocument::create_from_array(['type' => 'rut', 'number' => '16.036.959-K']);
        $this->assertEquals('rut', $doc->get_type());
        $this->assertEquals('16036959-k', $doc->get_number());

        $this->assertJsonStringEqualsJsonString('{"type": "rut", "number": "16036959-k"}', json_encode($doc));
    }

    /**
     * @expectedException edwrodrig\contento\type\cl\exception\InvalidIdDocumentTypeException
     * @expectedExceptionMessage wachulin
     */
    public function testIdDocumentInvalid() {
        $doc = IdDocument::create_from_array(['type' => 'wachulin', 'number' => '16.036.959-K']);
    }

    /**
     * @expectedException edwrodrig\contento\type\cl\exception\InvalidIdDocumentTypeException
     * @expectedExceptionMessage
     */
    public function testIdDocumentInvalid2() {
        $doc = IdDocument::create_from_array(['number' => '16.036.959-K']);
    }

    /**
     * @expectedException edwrodrig\contento\type\cl\exception\InvalidIdDocumentNumberException
     * @expectedExceptionMessage 16036959-a
     */
    public function testIdDocumentInvalid3() {
        $doc = IdDocument::create_from_array(['type' => 'rut', 'number' => '16.036.959-a']);
    }

    /**
     * @expectedException edwrodrig\contento\type\cl\exception\InvalidIdDocumentNumberException
     * @expectedExceptionMessage 16036959-a
     */
    public function testIdDocumentInvalid4() {
        $doc = IdDocument::create_from_array(['type' => 'rut', 'number' => '16.036.959-a']);
    }
}
