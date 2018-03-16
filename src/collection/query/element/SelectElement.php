<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 15:27
 */

namespace edwrodrig\contento\collection\query\element;

use edwrodrig\query\Select;

class SelectElement extends Select
{
    private $id_element;
    private $collection;

    public function __construct(\PDO $pdo)
    {
        $stmt = <<<SQL
SELECT
  id_element,
  collection,
  data
FROM
  contento_elements
WHERE
  id_element = :id_element AND
  collection = :collection
SQL;
        parent::__construct($pdo, $stmt);
    }

    public function where(string $id_element, string $collection) : self {
        $this->id_element = $id_element;
        $this->collection = $collection;

        $this
            ->b("id_element", $id_element)
            ->b("collection", $collection);

        return $this;
    }

}