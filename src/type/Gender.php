<?php
declare(strict_types=1);


namespace edwrodrig\contento\type;

/**
 * Class Gender
 *
 * A enumartion to hold a person gender.
 *
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