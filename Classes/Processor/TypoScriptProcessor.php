<?php
namespace Portrino\PxSemantic\Processor;

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

use Portrino\PxSemantic\Converter\TypoScriptTypeConverterInterface;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;

/**
 * Class TypoScriptProcessor
 *
 * @package Portrino\PxSemantic\Processor
 */
class TypoScriptProcessor implements \Portrino\PxSemantic\Processor\ProcessorInterface {

    /**
     * @var \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
     */
    protected $typoScriptFrontendController;

    /**
     * @var \TYPO3\CMS\Extbase\Reflection\ReflectionService
     * @inject
     */
    protected $reflectionService;

    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
     * @inject
     */
    protected $objectManager;

    /**
     * @var \TYPO3\CMS\Extbase\Service\TypoScriptService
     * @inject
     */
    protected $typoScriptService;

    /**
     * @var \Portrino\PxSemantic\Converter\TypoScriptTypeConverterFactory
     * @inject
     */
    protected $typoScriptTypeConverterFactory;

    /**
     * Initializes the controller before invoking an action method.
     *
     * Override this method to solve tasks which all actions have in
     * common.
     *
     * @return void
     */
    public function initializeObject() {
        if (TYPO3_MODE === 'FE') {
            $this->typoScriptFrontendController = $GLOBALS['TSFE'];
        }
    }

    /**
     *
     * @param \TYPO3\CMS\Extbase\DomainObject\AbstractEntity $entity
     * @param array $settings
     */
    public function process(&$entity, $settings = array()) {

        $typoScriptArray= $this->typoScriptService->convertPlainArrayToTypoScriptArray($settings);

        foreach ($settings as $propertyName => $propertyValue) {
                // if it is a content object
            if (is_array($propertyValue) && array_key_exists('_typoScriptNodeValue', $propertyValue)) {
                if (isset($typoScriptArray[$propertyName]) && isset($typoScriptArray[$propertyName . '.'])) {
                    /** @var TypoScriptTypeConverterInterface|NULL $converter */
                    $converter = $this->typoScriptTypeConverterFactory->get($typoScriptArray[$propertyName]);
                    if ($converter != NULL) {
                        $value = $converter->convert($typoScriptArray[$propertyName . '.']);
                    } else {
                        $value = $this->typoScriptFrontendController->cObj->cObjGetSingle($typoScriptArray[$propertyName], $typoScriptArray[$propertyName . '.']);
                    }

                    call_user_func_array(array($entity, 'set' . $propertyName), array($value));
                }
                // if it is a property which is an entity (called subEntity)
            } else if (is_array($propertyValue) && !array_key_exists('_typoScriptNodeValue', $propertyValue)) {

                $methodParameters = $this->reflectionService->getMethodParameters(get_class($entity), 'set' . $propertyName);
                if (isset($methodParameters[$propertyName])) {
                    $type = $methodParameters[$propertyName]['class'];

                    $subEntity = call_user_func(array($entity, 'get' . ucfirst($propertyName)));
                    $subEntity = $subEntity ? $subEntity : $this->objectManager->get($type);

                    $this->process($subEntity, $propertyValue);
                    call_user_func_array(array($entity, 'set' . $propertyName), array($subEntity));
                }
            } else {
                call_user_func_array(array($entity, 'set' . $propertyName), array($propertyValue));
            }
        }
    }
}