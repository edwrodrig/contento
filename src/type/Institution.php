<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 13:44
 */

namespace edwrodrig\contento\type;


/**
 * Class Institution
 * @package edwrodrig\contento\type
 * @contento_label_es institución
 * @contento_label_en institution
 */
class Institution
{
    /**
     * @var TranslatableString
     * @contento_displayable true
     * @contento_label_es nombre
     * @contento_label_en name
     */
    private $name;

    /**
     * @var string|null
     * @contento_label_es sigla
     * @contento_label_en abbreviation
     */
    private $short_name;

    /**
     * @var Country
     */
    private $country;

    /**
     * @var Url
     * @contento_label_es página web
     * @contento_label_en webpage
     */
    private $web_page;

    /**
     * @param array $data
     * @throws exception\InvalidUrlException
     */
    public function from_array(array $data) {
        $this->name = new TranslatableString($data['name']);
        $this->short_name = $data['short_name'] ?? null;

        $this->web_page = new Url($data['web_page']);
        $this->country = new Country($data['country']);

    }
}