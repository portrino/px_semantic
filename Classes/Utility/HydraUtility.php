<?php
namespace Portrino\PxSemantic\Utility;

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
 * Class HydraUtility
 */
class HydraUtility implements \TYPO3\CMS\Core\SingletonInterface
{

    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     */
    protected $configurationManager;

    /**
     * Contains the settings of the current extension
     *
     * @var array
     */
    protected $settings;

    /**
     * @var \TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder
     * @inject
     */
    protected $uriBuilder;

    /**
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
     * @return void
     */
    public function injectConfigurationManager(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager) {
        $this->configurationManager = $configurationManager;
        $this->settings = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
    }

    /**
     * @return string
     */
    public function getIriForEntrypoint() {

        $iri = $this->uriBuilder
            ->reset()
            ->setTargetPageUid($this->settings['rest']['pid'])
            ->setTargetPageType($this->settings['rest']['typeNum'])
            ->setUseCacheHash(false)
            ->uriFor(
                'index',
                [],
                'Api',
                'PxSemantic',
                'HydraApi'
            );

        return $iri;
    }

    /**
     * @return string
     */
    public function getVocabularyIri() {

        $iri = $this->uriBuilder
            ->reset()
            ->setTargetPageUid($this->settings['hydra']['pid'])
            ->setTargetPageType($this->settings['hydra']['vocabulary']['typeNum'])
            ->setUseCacheHash(false)
            ->uriFor(
                'index',
                [],
                'Vocabulary',
                'PxSemantic',
                'HydraVocabulary'
            );

        return $iri;
    }

    /**
     * @return string
     */
    public function getIriForContext($context) {

        $iri = $this->uriBuilder
            ->reset()
            ->setTargetPageUid($this->settings['hydra']['pid'])
            ->setTargetPageType($this->settings['hydra']['context']['typeNum'])
            ->setUseCacheHash(false)
            ->uriFor(
                'index',
                [
                    'context' => $context
                ],
                'Context',
                'PxSemantic',
                'HydraContext'
            );

        return $iri;
    }

    /**
     * @return string
     */
    public function getIriForEndpoint($endpoint) {

        $iri = $this->uriBuilder
            ->reset()
            ->setTargetPageUid($this->settings['rest']['pid'])
            ->setTargetPageType($this->settings['rest']['typeNum'])
            ->setUseCacheHash(false)
            ->uriFor(
                'index',
                [
                    'endpoint' => $endpoint
                ],
                'Api',
                'PxSemantic',
                'HydraApi'
            );

        return $iri;
    }


    /**
     * @param string $endpoint
     * @param int $uid
     *
     * @return string
     */
    public function getIriForEndpointAndUid($endpoint, $uid) {

        $iri = $this->uriBuilder
            ->reset()
            ->setTargetPageUid($this->settings['rest']['pid'])
            ->setTargetPageType($this->settings['rest']['typeNum'])
            ->setUseCacheHash(false)
            ->uriFor(
                'index',
                [
                    'endpoint' => $endpoint,
                    'uid' => $uid
                ],
                'Api',
                'PxSemantic',
                'HydraApi'
            );

        return $iri;
    }
}