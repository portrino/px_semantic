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

/**
 * Class AbstractProcessor
 *
 * @package Portrino\PxSemantic\Processor
 */
abstract class AbstractProcessor implements \Portrino\PxSemantic\Processor\ProcessorInterface {

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
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
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
     * @var int|NULL
     */
    protected $entityId = NULL;

    /**
     * Initializes the processor before invoking the process method
     *
     *
     * @return void
     */
    public function initializeObject() {
        $this->typoScriptFrontendController = $GLOBALS['TSFE'];
        /**
         * get the entityId from configuration of PxSemantic settings
         */
        $this->configuration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
        $this->entityId = (isset($this->configuration['entity']['id']) && (int)$this->configuration['entity']['id'] > 0) ?  (int)$this->configuration['entity']['id'] : NULL;
    }

}