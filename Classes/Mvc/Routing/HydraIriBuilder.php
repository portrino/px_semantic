<?php
namespace Portrino\PxSemantic\Mvc\Routing;

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
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;

/**
 * Class HydraIriBuilder
 *
 * @package Portrino\PxSemantic\Mvc\Routing
 */
class HydraIriBuilder extends UriBuilder
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
    public function iriForEntrypoint() {

        $iri = $this
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
    public function iriForVocabulary() {

        $iri = $this
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
        return rtrim($iri, '/') . '#';
    }

    /**
     * @return string
     */
    public function iriForContext($context) {

        $iri = $this
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

        return preg_replace('/([^:])(\/{2,})/', '$1/', $iri);
    }

    /**
     * @return string
     */
    public function iriFor($endpoint, $offset = 0, $limit = 10) {

        $arguments = [
            'limit' => $limit,
            'offset' => $offset
        ];

        $iri = $this
            ->reset()
            ->setTargetPageUid($this->settings['rest']['pid'])
            ->setTargetPageType($this->settings['rest']['typeNum'])
            ->setUseCacheHash(false)
            ->setArguments($arguments)
            ->uriFor(
                'index',
                [
                    'endpoint' => $endpoint
                ],
                'Api',
                'PxSemantic',
                'HydraApi'
            );

        return preg_replace('/([^:])(\/{2,})/', '$1/', $iri);
    }

    /**
     * @param string $endpoint
     * @param int $limit
     * @param string $constraint
     *
     * @return string
     */
    public function iriForFirstPage($endpoint, $limit = 10, $constraint = '') {

        if ($limit === 10) {
            $iri = $this->iriFor($endpoint);
        } else {

            $arguments = [
                'offset' => 0,
                'limit' => $limit,
            ];

            if ($constraint != '') {
                $arguments['constraint'] = $constraint;
            }

            $iri = $this
                ->reset()
                ->setTargetPageUid($this->settings['rest']['pid'])
                ->setTargetPageType($this->settings['rest']['typeNum'])
                ->setArguments($arguments)
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
        }

        return preg_replace('/([^:])(\/{2,})/', '$1/', $iri);
    }

    /**
     * @param string $endpoint
     * @param int $currentOffset
     * @param int $limit
     * @param string $constraint
     *
     * @return string
     */
    public function iriForPreviousPage($endpoint, $currentOffset = 0, $limit = 10, $constraint = '') {

        $offset = ($currentOffset - $limit > 0) ? $currentOffset - $limit : 0;

        $arguments = [
            'offset' => $offset,
            'limit' => $limit,
        ];

        if ($constraint != '') {
            $arguments['constraint'] = $constraint;
        }

        $iri = $this
            ->reset()
            ->setTargetPageUid($this->settings['rest']['pid'])
            ->setTargetPageType($this->settings['rest']['typeNum'])
            ->setArguments($arguments)
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

        return preg_replace('/([^:])(\/{2,})/', '$1/', $iri);
    }

    /**
     * @param string $endpoint
     * @param int $currentOffset
     * @param int $limit
     * @param string $constraint
     *
     * @return string
     */
    public function iriForNextPage($endpoint, $currentOffset = 0, $limit = 10, $constraint = '') {

        $arguments = [
            'offset' => $currentOffset + $limit,
            'limit' => $limit,
        ];

        if ($constraint != '') {
            $arguments['constraint'] = $constraint;
        }

        $iri = $this
            ->reset()
            ->setTargetPageUid($this->settings['rest']['pid'])
            ->setTargetPageType($this->settings['rest']['typeNum'])
            ->setArguments($arguments)
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

        return preg_replace('/([^:])(\/{2,})/', '$1/', $iri);
    }

    /**
     * @param string $endpoint
     * @param int $total
     * @param int $limit
     * @param string $constraint
     *
     * @return string
     */
    public function iriForLastPage($endpoint, $total, $limit = 10, $constraint = '') {

        $arguments = [
            'offset' => $total - ($total % $limit),
            'limit' => $limit,
        ];

        if ($constraint != '') {
            $arguments['constraint'] = $constraint;
        }

        $iri = $this
            ->reset()
            ->setTargetPageUid($this->settings['rest']['pid'])
            ->setTargetPageType($this->settings['rest']['typeNum'])
            ->setArguments($arguments)
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

        return preg_replace('/([^:])(\/{2,})/', '$1/', $iri);
    }

    /**
     * @param string $endpoint
     * @param int $uid
     *
     * @return string
     */
    public function iriForUid($endpoint, $uid) {

        $iri = $this
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

        return preg_replace('/([^:])(\/{2,})/', '$1/', $iri);
    }
}