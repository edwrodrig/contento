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
class Gender
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

    /**
     * @var string|null
     */
    public $gender;

    /**
     * Gender constructor.
     * @param null|string $gender
     * @throws exception\InvalidGenderException
     */
    public function __construct(string $gender) {

        $this->gender = $gender;

        if ( self::MALE == $gender);
        else if ( self::FEMALE == $gender );
        else throw new exception\InvalidGenderException($gender);
    }

    public function jsonSerialize() {
        return $this->gender;
    }

}