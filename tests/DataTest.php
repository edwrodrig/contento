<?php

use edwrodrig\contento\data\Data;

class DataTest extends \PHPUnit\Framework\TestCase {

static function setUpBeforeClass() {
  Data::set('imo', ['person' => '\edwrodrig\contento\data\Entity', 'duration' => '\edwrodrig\contento\data\EntityDuration']);
}


function testExample() {
  \edwrodrig\contento\data\data('imo')['person'] = [
    'edw' => ['name' => 'edwin', 'surname' => 'rodriguez'],
    'edg' => ['name' => 'edgar', 'surname' => 'rodriguez']
  ];

  \edwrodrig\contento\data\data('imo')['duration'] = [
    ['start_date' => '1900-01-01', 'end_date' => '2000-01-01'],
    ['start_date' => '1985-02-02', 'end_date' => '1990-12-25']
  ];


  $e = \edwrodrig\contento\data\data('imo')['person']['edw'];

  $this->assertEquals('edwin', $e['name']);
  $this->assertEquals('rodriguez', $e['surname']);


  $e = \edwrodrig\contento\data\data('imo')['duration'][0];
  
  $this->assertEquals('1900-01-01', $e['start_date']);
}

}

