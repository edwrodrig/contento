<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 13:31
 */


namespace edwrodrig\contento\type;

/**
 * Class Gender
 * @package edwrodrig\contento\type
 * @contento_label_es género
 * @contento_label_en gender
 */
class Gender extends Enumeration
{

    /**
     * @contento_label_es masculino
     * @contento_label_en male
     */
    const MALE = 'm';

    /**
     * @contento_label_es femenino
     * @contento_label_en female
     */
    const FEMALE = 'f';

}