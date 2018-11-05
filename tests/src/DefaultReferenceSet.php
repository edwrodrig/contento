<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 05-11-18
 * Time: 17:10
 */

namespace test\edwrodrig\contento;

use edwrodrig\contento\type\ReferenceSet;

/**
 * Class DefaultReferenceSet
 * @package test\edwrodrig\contento
 * @method DefaultReference[] getIterator()
 */
class DefaultReferenceSet extends ReferenceSet
{
    public function __construct() {
        parent::__construct(DefaultReference::class);
    }
}