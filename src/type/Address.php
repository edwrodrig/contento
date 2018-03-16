<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 13:35
 */

namespace edwrodrig\contento\type;

/**
 * Class Address
 * @package edwrodrig\contento\data\type
 * @contento_label_es dirección
 * @contento_label_en address
 */
class Address
{

    /**
     * @var string
     * @contento_label_es calle
     * @contento_label_en street
     */
    private $street;

    /**
     * @var string
     * @contento_label_es número
     * @contento_label_en number
     */
    private $number;

    /**
     * @var string
     * @contento_label_es ciudad
     * @contento_label_en city
     */
    private $city;

    /**
     * @var string
     * @contento_style area
     */
    private $extra;


    /**
     * @var Country
     */
    private $country;

    /**
     * @var string
     * @contento_label_es código postal
     * @contento_label_en zip code
     */
    private $zip;


/**
{
"name": "common_address",
"type": "object",
"fields": [
{"field": "extra", "type": "string", "style": "area"},
*/
}