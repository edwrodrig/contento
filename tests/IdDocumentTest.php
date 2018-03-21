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
    }
}
