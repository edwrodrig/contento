<?php
declare(strict_types=1);

namespace edwrodrig\contento\type;

use JsonSerializable;

/**
 * Class Doi
 * 
 * This class contains a valid doi string. 
 * @package edwrodrig\contento\type
 * @contento_label_es Doi
 * @contento_label_en Doi
 */
class Doi implements JsonSerializable
{
    /**
     * The doi string
     * @var string
     */
    private $doi;

    /**
     * The regular expression
     */
    const DOI_REGEX = '/^10\.\d{4,9}\/[-\/\._;\(\):A-Z0-9]+$/i';

    /**
     * Doi constructor.
     * 
     * Creates a Doi object an throw exception if it does not satisfy the {@see Doi::DOI_REGEX pattern}.
     * @param string $doi
     * @throws exception\InvalidDoiException
     */
    public function __construct(string $doi) {
        if ( preg_match(self::DOI_REGEX, $doi) !== 1 )
            throw new exception\InvalidDoiException($doi);

        $this->doi = $doi;
    }

    /**
     * Return the doi string
     * @return string
     */
    public function __toString() : string {
        return $this->doi;
    }

    /**
     * For serialization
     * @return string
     */
    public function jsonSerialize()
    {
        return $this->doi;
    }
}