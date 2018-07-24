<?php
declare(strict_types=1);

namespace edwrodrig\contento\type\cl;

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

    /**
     * @param array $data
     * @return IdDocument
     * @throws \edwrodrig\contento\type\exception\InvalidEnumerationValueException
     * @throws exception\InvalidIdDocumentNumberException
     */
    public static function createFromArray(array $data) {
        $r = new self;
        $r->fromArray($data);
        return $r;
    }

    /**
     * @param array $data
     * @throws exception\InvalidIdDocumentNumberException
     * @throws \edwrodrig\contento\type\exception\InvalidEnumerationValueException
     */
    public function fromArray(array $data) {
        $this->type = new IdDocumentType($data['type'] ?? '');

        $this->number = $this->type->validate($data['number'] ?? '');
    }

    public function toArray() : array {
        return [
            'type' => $this->type,
            'number' => $this->number
        ];
    }

    /**
     * Get the type of the identification document
     *
     * For example: rut, pp, etc
     * @return IdDocumentType
     */
    public function getType() : IdDocumentType {
        return $this->type;
    }

    /**
     * Get the number of the identification document
     * @return string
     */
    public function getNumber() : string {
        return $this->number;
    }

    public function jsonSerialize() {
        return $this->toArray();
    }


}