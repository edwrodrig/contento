<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 15:35
 */

namespace edwrodrig\contento\type;

interface Element extends \JsonSerializable {

    const TABLE = <<<SQL
CREATE TABLE contento_elements
(
  id_element TEXT PRIMARY KEY,
  collection TEXT NOT NULL,
  data TEXT NOT NULL
)
VALUES
(
  :id_element,
  :collection,
  :data
)
SQL;

    public function get_id() : string;

    public function get_collection() : string;
}