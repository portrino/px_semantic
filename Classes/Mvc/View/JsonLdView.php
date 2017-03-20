<?php
namespace Portrino\PxSemantic\Mvc\View;

    /***************************************************************
     *  Copyright notice
     *
     *  (c) 2017 Andre Wuttig <wuttig@portrino.de>, portrino GmbH
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
use TYPO3\CMS\Extbase\Mvc\View\JsonView;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;

/**
 * Class JsonLdView
 *
 * @package Portrino\PxSemantic\Mvc\View
 */
class JsonLdView extends JsonView
{
    /** @noinspection PhpMissingParentCallCommonInspection */

    /**
     * Transforms the value view variable to a serializable
     * array represantion using a YAML view configuration and JSON encodes
     * the result.
     *
     * @return string The JSON encoded variables
     * @api
     */
    public function render()
    {
        $this->controllerContext->getResponse()->setHeader('Content-Type', 'application/ld+json');
        $propertiesToRender = $this->renderArray();
        return json_encode($propertiesToRender, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }/** @noinspection PhpMissingParentCallCommonInspection */

    /**
     * Traverses the given object structure in order to transform it into an
     * array structure.
     *
     * @param object $object Object to traverse
     * @param array $configuration Configuration for transforming the given object or NULL
     *
     * @return array Object structure as an array
     */
    protected function transformObject($object, array $configuration)
    {
        if ($object instanceof \DateTime) {
            return $object->format(\DateTime::ISO8601);
        } else {
            $propertyNames = ObjectAccess::getGettablePropertyNames($object);

            $propertiesToRender = [];
            foreach ($propertyNames as $propertyName) {

                if (isset($configuration['_only']) && is_array($configuration['_only']) && !in_array($propertyName, $configuration['_only'])) {
                    continue;
                }
                if (isset($configuration['_exclude']) && is_array($configuration['_exclude']) && in_array($propertyName, $configuration['_exclude'])) {
                    continue;
                }

                $propertyValue = ObjectAccess::getProperty($object, $propertyName);

                if ($propertyValue != null) {
                    if (!is_array($propertyValue) && !is_object($propertyValue)) {

                        switch ($propertyName) {
                            case 'context':
                                $propertiesToRender['@context'] = $propertyValue;
                                break;
                            case 'type':
                                $propertiesToRender['@type'] = $propertyValue;
                                break;
                            case 'id':
                                $propertiesToRender['@id'] = $propertyValue;
                                break;
                            default:
                                $propertiesToRender[$propertyName] = $propertyValue;
                                break;
                        }

                    } elseif (isset($configuration['_descend']) && array_key_exists($propertyName, $configuration['_descend'])) {
                        $propertiesToRender[$propertyName] = $this->transformValue($propertyValue, $configuration['_descend'][$propertyName]);
                    } else {
                        $propertiesToRender[$propertyName] = $this->transformValue($propertyValue, []);
                    }
                }


            }
            if (isset($configuration['_exposeObjectIdentifier']) && $configuration['_exposeObjectIdentifier'] === TRUE) {
                if (isset($configuration['_exposedObjectIdentifierKey']) && strlen($configuration['_exposedObjectIdentifierKey']) > 0) {
                    $identityKey = $configuration['_exposedObjectIdentifierKey'];
                } else {
                    $identityKey = '__identity';
                }
                $propertiesToRender[$identityKey] = $this->persistenceManager->getIdentifierByObject($object);
            }
            if (isset($configuration['_exposeClassName']) && ($configuration['_exposeClassName'] === self::EXPOSE_CLASSNAME_FULLY_QUALIFIED || $configuration['_exposeClassName'] === self::EXPOSE_CLASSNAME_UNQUALIFIED)) {
                $className = get_class($object);
                $classNameParts = explode('\\', $className);
                $propertiesToRender['__class'] = ($configuration['_exposeClassName'] === self::EXPOSE_CLASSNAME_FULLY_QUALIFIED ? $className : array_pop($classNameParts));
            }
            return $propertiesToRender;
        }
    }

}