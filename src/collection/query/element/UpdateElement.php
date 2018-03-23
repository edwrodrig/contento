<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 15:39
 */

namespace edwrodrig\contento\collection\query\element;

use edwrodrig\contento\type\Element;
use edwrodrig\query\Update;

class UpdateElement extends Update
{
    /**
     * @var Element
     */
    private $element;

    public function __construct(\PDO $pdo) {
        $stmt = <<<SQL
UPDATE
  contento_elements
SET
  data = :data
FROM
  id_element = :id_element AND
  collection = :collection
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