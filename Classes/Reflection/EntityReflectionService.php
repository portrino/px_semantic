<?php
namespace Portrino\PxSemantic\Reflection;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Andre Wuttig <wuttig@portrino.de>, portrino GmbH
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
use TYPO3\CMS\Core\SingletonInterface;

/**
 * Class EntityReflectionService
 */
class EntityReflectionService implements SingletonInterface
{

    /**
     * retrieves all property entities from one parent entity recursively
     *
     * @param $entityClassName
     *
     * @return array
     */
    public function getPropertyEntitiesRecursive($entityClassName, $result = [])
    {
        $reflectionClass = new \ReflectionClass($entityClassName);
        $properties = $reflectionClass->getProperties();
        /** @var \ReflectionProperty $reflectionProperty */
        foreach ($properties as $reflectionProperty) {
            if (preg_match('/@var\s+([^\s]+)/', $reflectionProperty->getDocComment(), $matches)) {
                list(, $type) = $matches;
                $entityClassName = 'Portrino\\PxSemantic\\SchemaOrg\\' . str_replace('\\', '', $type);

                if (class_exists($entityClassName) && array_key_exists($entityClassName, $result) === false) {
                    $result[$entityClassName] = $entityClassName;
                    $this->getPropertyEntitiesRecursive($entityClassName, $result);
                }
            }
        }
        return $result;
    }

}