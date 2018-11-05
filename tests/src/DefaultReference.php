<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 05-11-18
 * Time: 16:55
 */

namespace test\edwrodrig\contento;

use edwrodrig\contento\collection\Collection;
use edwrodrig\contento\type\DefaultElement;
use edwrodrig\contento\type\Reference;


/**
 * Class DefaultReference
 * @method DefaultElement getElement()
 */
class DefaultReference extends Reference {
    public static $collection;

    public function __construct(string $id) {
        parent::__construct('default', $id);
    }

    public static function getCollection() : Collection {
        return self::$collection;
    }
};