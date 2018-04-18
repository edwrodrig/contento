<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 21-03-18
 * Time: 13:07
 */

namespace edwrodrig\contento\type\cl;
use edwrodrig\contento\type\Enumeration;

/**
 * @contento_label_es tipo de documento de identificación
 * @contento_label_en identification document type
 */
class IdDocumentType extends Enumeration
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
     * @param $number
     * @return string
     * @throws exception\InvalidIdDocumentNumberException
     */
    public function validate(string $number) : string {

        $number = trim($number ?? '');
        $number = strtolower($number);


        if ( strlen($number) < 4 )
            throw new exception\InvalidIdDocumentNumberException($number);

        if ( $this->value == IdDocumentType::RUT ) {
            $number = str_replace('.', '', $number);
            if ( !preg_match('/\d+-[\dk]/', $number) )
                throw new exception\InvalidIdDocumentNumberException($number);
        }

        return $number;
    }
}
