<?php

namespace Portrino\PxSemantic\Processor;

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
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/**
 * Class AbstractProcessor
 *
 * @package Portrino\PxSemantic\Processor
 */
abstract class AbstractProcessor implements ProcessorInterface
{

    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
     * @inject
     */
    protected $objectManager;

    /**
     * @var \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
     */
    protected $typoScriptFrontendController;

    /**
     * @var \TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder
     * @inject
     */
    protected $uriBuilder;

    /**
     * @var \TYPO3\CMS\Extbase\Service\ImageService
     * @inject
     */
    protected $imageService;

    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
     * @inject
     */
    protected $configurationManager;

    /**
     * the configuration array of PxSemantic StructuredData Plugin
     *
     * @var array
     */
    protected $configuration;

    /**
     * @var int|null
     */
    protected $resourceId = null;

    /**
     * Initializes the processor before invoking the process method
     *
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->typoScriptFrontendController = $GLOBALS['TSFE'];

        /**
         * get the resourceId from configuration of PxSemantic settings
         */
        $this->configuration = $this->configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);

        if (isset($this->configuration['resource']['id'])) {
            if (is_array($this->configuration['resource']['id']) &&
                array_key_exists('_typoScriptNodeValue', $this->configuration['resource']['id'])
            ) {
                $this->resourceId = $this->typoScriptFrontendController
                    ->cObj
                    ->cObjGetSingle(
                        $this->configuration['resource']['id']['_typoScriptNodeValue'],
                        $this->configuration['resource']['id']
                    );
            } else {
                $this->resourceId = (int)$this->configuration['resource']['id'];
            }
        }
    }

}