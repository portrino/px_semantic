<?php
namespace Portrino\PxSemantic\ViewHelpers\Format\Jsonld;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Andre Wuttig <wuttig@portrino.de>, portrino GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;
use TYPO3\CMS\Fluid\Core\ViewHelper\Exception;

/**
 * Class EncodeViewHelper
 *
 * @package Portrino\PxSemantic\ViewHelpers\Format\Jsonld
 */
class EncodeViewHelper extends \FluidTYPO3\Vhs\ViewHelpers\Format\Json\EncodeViewHelper
{

    /**
     * @var string
     */
    protected $context = 'http://schema.org';

    /**
     * @param mixed $value Array or Traversable
     * @param boolean $useTraversableKeys If TRUE, preserves keys from Traversables converted to arrays. Not recommended for ObjectStorages!
     * @param boolean $preventRecursion If FALSE, allows recursion to occur which could potentially be fatal to the output unless managed
     * @param mixed $recursionMarker Any value - string, integer, boolean, object or NULL - inserted instead of recursive instances of objects
     * @param string $dateTimeFormat A date() format for converting DateTime values to JSON-compatible values. NULL means JS UNIXTIME (time()*1000)
     * @param string $context context (e.g.: http://schema.org)
     *
     * @return string
     */
    public function render(
        $value = null,
        $useTraversableKeys = false,
        $preventRecursion = true,
        $recursionMarker = null,
        $dateTimeFormat = null,
        $context = 'http://schema.org'
    ) {
        $this->context = $context;
        return parent::render($value, $useTraversableKeys, $preventRecursion, $recursionMarker, $dateTimeFormat);
    }

    /**
     * Convert a single DomainObject instance first to an array, then pass
     * that array through recursive DomainObject detection. This will convert
     * any 1:1, 1:n, n:1 and m:n relations.
     *
     * @param DomainObjectInterface $domainObject
     * @param boolean $preventRecursion
     * @param mixed $recursionMarker
     *
     * @return array
     */
    protected function recursiveDomainObjectToArray(
        DomainObjectInterface $domainObject,
        $preventRecursion,
        $recursionMarker
    ) {
        $hash = spl_object_hash($domainObject);
        if (true === $preventRecursion && true === in_array($hash, $this->encounteredClasses)) {
            return $recursionMarker;
        }
        $converted = ObjectAccess::getGettableProperties($domainObject);
        $reflect = new \ReflectionClass($domainObject);
        if ($reflect) {
            $converted['@type'] = $reflect->getShortName();
            $converted['@context'] = $this->context;
            if (method_exists($domainObject, 'getId') && empty($domainObject->getId()) === false) {
                $converted['@id'] = $domainObject->getId();
                unset($converted['id']);
            }
        }

        foreach ($converted as $key => $item) {
            if ($item === null) {
                unset($converted[$key]);
            }
        }

        array_push($this->encounteredClasses, $hash);
        $converted = $this->recursiveArrayOfDomainObjectsToArray($converted, $preventRecursion, $recursionMarker);
        return $converted;
    }

}
