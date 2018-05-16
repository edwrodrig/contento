<?php
declare(strict_types=1);

namespace edwrodrig\contento\type;

use JsonSerializable;

/**
 * Interface Element
 *
 * Interface that must implements elements of a {@see Collection collection}
 * @package edwrodrig\contento\type
 */
interface Element extends JsonSerializable {

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

    /**
     * Get the id of the element.
     * Must be unique inside a {@see Collection collection}
     * @return string
     */
    public function getId() : string;

    /**
     * Get collection name
     *
     * Get the name of the {@see Collection collection} that the object belong.
     * Think about this as a table name in a database or a class name
     * @return string
     */
    public function getCollection() : string;
}