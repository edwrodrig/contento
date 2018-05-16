<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 17-04-18
 * Time: 15:57
 */

namespace test\edwrodrig\contento\type\cl;

use edwrodrig\contento\type\cl\IdDocumentType;
use PHPUnit\Framework\TestCase;

class IdDocumentTypeTest extends TestCase
{
    public function testValidate() {
        $type = new IdDocumentType('pp');
        $this->assertEquals('nr9hk2l70', $type->validate('NR9HK2L70'));
    }
}
