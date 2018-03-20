<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 13:53
 */

namespace edwrodrig\contento\type;


class Doi
{
    private $doi;

    /**
     * Doi constructor.
     * @param string $doi
     * @throws exception\InvalidDoiException
     */
    public function __construct(string $doi) {
        if ( preg_match('/^10\.\d{4,9}\/[-\/\._;\(\):A-Z0-9]+$/i', $doi) !== 1 )
            throw new exception\InvalidDoiException($doi);

        $this->doi = $doi;
    }

    public function __toString() : string {
        return $this->doi;
    }
}