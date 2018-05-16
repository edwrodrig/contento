<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 20-03-18
 * Time: 15:27
 */

use edwrodrig\contento\type\Country;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    public function testCollection() {

        $country = new Country('chile');

        $this->assertEquals('"chile"', json_encode($country));
        $this->assertEquals('chile', strval($country));
    }
}
