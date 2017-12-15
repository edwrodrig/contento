<?php

use \edwrodrig\contento\data\Collections;

class CollectionTests extends \PHPUnit\Framework\TestCase {

function testExample() {
  $collections = new Collections();
  $collections['personas'] = ['edw' => ['name' => 'edwin', 'surname' => 'rodriguez']];

  $e = $collections['personas']['edw'];

  $this->assertEquals('edwin', $e['name']);
  $this->assertEquals('rodriguez', $e['surname']);
}

}

