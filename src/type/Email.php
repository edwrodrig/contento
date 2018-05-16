<?php
declare(strict_types=1);

namespace edwrodrig\contento\type;
use JsonSerializable;


/**
 * Class Email
 *
 * A container class for a valid mail string
 * @package edwrodrig\contento\type
 * @contento_label_es correo electrónico
 * @contento_label_en email
 */
class Email implements JsonSerializable
{
    /**
     * A valid email string
     * @var string
     */
    private $mail;

    /**
     * Email constructor.
     *
     * Throws an exception if the mail is invalid
     * @param string $mail
     * @uses filter_var()
     * @uses FILTER_VALIDATE_EMAIL
     * @throws exception\InvalidMailException
     */
    public function __construct(string $mail)
    {
        if ( filter_var($mail, FILTER_VALIDATE_EMAIL) === FALSE )
            throw new exception\InvalidMailException($mail);

        $this->mail = $mail;

    }

    /**
     * Get the domain of the mail.
     *
     * The part after arroba
     * @return string
     */
    public function getDomain() : string {
        return explode('@', $this->mail)[1];
    }

    /**
     * For string
     * @return string
     */
    public function __toString() : string {
        return $this->mail;
    }

    /**
     * For serializing
     * @return mixed|string
     */
    public function jsonSerialize() {
        return $this->mail;
    }
}