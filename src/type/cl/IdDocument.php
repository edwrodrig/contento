<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 21-03-18
 * Time: 13:07
 */

namespace edwrodrig\contento\type\cl;
/*
 * @contento_label_es documento de identificación
 * @contento_label_en identification document
 */
use JsonSerializable;


/**
 * @contento_label_es documento de identificación
 * @contento_label_en identification document
 */
class IdDocument implements JsonSerializable
{
    /**
     * @var IdDocumentType
     * @contento_label_es tipo
     * @contento_label_en type
     */
    private $type;

    /**
     * @var string
     * @contento_label_es número
     * @contento_label_en number
     */
    public $number;

    public static function create_from_array(array $data) {
        $r = new self;
        $r->from_array($data);
        return $r;
    }

    /**
     * @param array $data
     * @throws exception\InvalidIdDocumentNumberException
     * @throws exception\InvalidIdDocumentTypeErrorException
     */
    public function from_array(array $data) {
        $this->type = new IdDocumentType($data['type'] ?? '');

        $this->number = $this->type->validate($data['number'] ?? '');
    }

    public function to_array() : array {
        return [
            'type' => $this->type,
            'number' => $this->number
        ];
    }

    public function get_type() : IdDocumentType {
        return $this->type;
    }

    public function get_number() : string {
        return $this->number;
    }

    public function jsonSerialize() {
        return $this->to_array();
    }


}