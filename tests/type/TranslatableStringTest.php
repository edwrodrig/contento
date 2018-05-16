<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 20-03-18
 * Time: 16:33
 */

namespace test\edwrodrig\contento\type;

use edwrodrig\contento\type\TranslatableString;

class TranslatableStringTest extends \PHPUnit\Framework\TestCase
{

    public function testTranslatableString() {
        $tr = new TranslatableString(['es' => 'hola', 'en' => 'hello']);
        $this->assertEquals('hola', $tr['es']);
        $this->assertEquals('hello', $tr['en']);
        $this->assertFalse(isset($tr['fr']));
    }
}
