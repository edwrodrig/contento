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
     * @contento_label_es rut
     * @contento_label_en rut
     */
    const RUT = 'rut';

    /**
     * @contento_label_es pasaporte
     * @contento_label_en passport
     */
    const PP = 'pp';

    /**
     * @contento_label_es otro
     * @contento_label_en other
     */
    const OTHER = 'other';

    /**
     * @var string
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
        $this->type = $data['type'] ?? null;
        if ( is_null($this->type) || !in_array($this->type, [self::RUT, self::PP, self::OTHER]) )
            throw new exception\InvalidIdDocumentTypeErrorException($this->type ?? '');

        $this->number = trim($data['number'] ?? '');
        $this->number = strtolower($this->number);

        if ( strlen($this->number) < 4 )
            throw new exception\InvalidIdDocumentNumberException($this->number);

        if ( $this->type == 'rut' ) {
            $this->number = str_replace('.', '', $this->number);
            if ( !preg_match('/\d+-[\dk]/', $this->number) ) {
                throw new exception\InvalidIdDocumentNumberException($this->number);
            }
        }
    }

    public function to_array() : array {
        return [
            'type' => $this->type,
            'number' => $this->number
        ];
    }

    public function get_type() : string {
        return $this->type;
    }

    public function get_number() : string {
        return $this->number;
    }

    public function jsonSerialize() {
        return $this->to_array();
    }


}