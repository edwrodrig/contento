<?php
namespace edwrodrig\contento\data;

class Collections implements \ArrayAccess {

public $entities = [];

public $data = [];

function __construct(array $entities = []) {
  $this->entities = $entities;
}

function offsetExists($offset) {
  return isset($this->data[$offset]);

}

function offsetGet($offset) {
  if ( isset($this->data[$offset]) )
   return $this->data[$offset];
  else throw new \Exception(sprintf('Collection [%s] does not exists', $offset)); 
}

function offsetSet($offset, $value) {
  $entity = $this->entities[$offset] ?? '\edwrodrig\contento\data\Entity';

  $collection = new Collection($offset, $entity);
  $collection->set($value);

  $this->data[$offset] = $collection;
}

function offsetUnset($offset) { unset($this->data[$offset]); }

}


