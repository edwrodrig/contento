<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 21-03-18
 * Time: 13:07
 */

namespace edwrodrig\contento\type\cl;

use JsonSerializable;

/**
 * @contento_label_es tipo de documento de identificación
 * @contento_label_en identification document type
 */
class IdDocumentType implements JsonSerializable
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
     */
    private $type;

    /**
     * Type constructor.
     * @param string $type
     * @throws exception\InvalidIdDocumentTypeErrorException
     */
    public function __construct(string $type) {

        $this->type = $type;

        if ( self::RUT == $type);
        else if ( self::PP == $type );
        else if ( self::OTHER == $type );
        else throw new exception\InvalidIdDocumentTypeErrorException($type);
    }

    public function __toString() : string {
        return $this->type;
    }

    public function jsonSerialize() {
        return $this->type;
    }

    /**
     * @param $number
     * @return string
     * @throws exception\InvalidIdDocumentNumberException
     */
    public function validate($number) : string {

        $number = trim($number ?? '');
        $number = strtolower($number);


        if ( strlen($number) < 4 )
            throw new exception\InvalidIdDocumentNumberException($number);

        if ( $this->type == IdDocumentType::RUT ) {
            $number = str_replace('.', '', $number);
            if ( !preg_match('/\d+-[\dk]/', $number) ) {
                throw new exception\InvalidIdDocumentNumberException($number);
        }

        return $number;
    }
}


}