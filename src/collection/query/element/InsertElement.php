<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 15:33
 */

namespace edwrodrig\contento\collection\query\element;

use edwrodrig\query\Insert;

class InsertElement extends Insert
{
    private $element;

    public function __construct(\PDO $pdo) {
        $stmt = <<<SQL
INSERT INTO
  contento_elements
(
  id_element,
  collection,
  data
)
VALUES
(
  :id_element,
  :collection,
  :data
)
SQL;
        parent::__construct($pdo, $stmt);
    }

    public function set(Element $element) {
        $this->element = $element;
        $this
            ->b('id_element', strval($element->get_id()))
            ->b('collection', $element->get_collection())
            ->b('data', json_encode($element));

        return $this;
    }

}