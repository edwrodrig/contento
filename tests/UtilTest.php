<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 18-04-18
 * Time: 16:31
 */

use edwrodrig\contento\type\Email;
use edwrodrig\contento\Util;
use PHPUnit\Framework\TestCase;

class UtilTest extends TestCase
{
    public function testCreateOrNull() {
        $data = [
            'null' => null,
            'wrong_mail' => 'edwin',
            'ok_mail' => 'edwin@mail.com'
        ];
        $this->assertNull(Util::create_or_null($data['unexistant'], Email::class));
        $this->assertNull(Util::create_or_null($data['null'], Email::class));
        $this->assertNull(Util::create_or_null($data['wrong_mail'], Email::class));
        $this->assertInstanceOf(Email::class, Util::create_or_null($data['ok_mail'], Email::class));
    }
}
