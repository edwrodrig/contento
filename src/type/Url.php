<?php
declare(strict_types=1);

namespace edwrodrig\contento\type;
use JsonSerializable;

/**
 * Class Url
 *
 * A container class for a Url string.
 * @package edwrodrig\contento\type
 * @contento_label_es dirección web
 * @contento_label_en web address
 */
class Url implements JsonSerializable
{
    /**
     * A valid url
     * @var string
     */
    private $url;

    /**
     * Url constructor.
     *
     * Must be a complete url. Relative urls will fails
     * @uses FILTER_VALIDATE_URL
     * @uses filter_var()
     * @param string $url
     * @throws exception\InvalidUrlException if the url is invalid
     */
    public function __construct(string $url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE)
            throw new exception\InvalidUrlException($url);
        $this->url = $url;
    }

    /**
     * Get the url as string
     * @return string
     */
    public function __toString() : string {
        return $this->url;
    }

    /**
     * For json serialization
     * @return mixed|string
     */
    public function jsonSerialize() {
        return $this->url;
    }
}