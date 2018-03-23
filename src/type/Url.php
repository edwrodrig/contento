<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 13:46
 */

namespace edwrodrig\contento\type;

/**
 * Class Url
 * @package edwrodrig\contento\type
 * @contento_label_es dirección web
 * @contento_label_en web address
 */
class Url implements \JsonSerializable
{
    /**
     * @var string
     */
    private $url;

    /**
     * Url constructor.
     * @param string $url
     * @throws exception\InvalidUrlException
     */
    public function __construct(string $url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE)
            throw new exception\InvalidUrlException($url);
        $this->url = $url;
    }

    public function __toString() : string {
        return $this->url;
    }

    public function jsonSerialize() {
        return $this->url;
    }
}