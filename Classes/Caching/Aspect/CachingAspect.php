<?php
namespace Portrino\PxSemantic\Caching\Aspect;

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
use Portrino\PxSemantic\Caching\CacheableResponse;
use Portrino\PxSemantic\Controller\ApiController;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Cache\Frontend\FrontendInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Mvc\Web\Request;
use TYPO3\CMS\Extbase\Mvc\Web\Response;

/**
 * Class CachingAspect
 *
 * @package Portrino\PxSemantic\Caching\Aspect
 */
class CachingAspect
{

    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
     * @inject
     */
    protected $objectManager;

    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     */
    protected $configurationManager;

    /**
     * Contains the settings of the current extension
     *
     * @var array
     * @api
     */
    protected $settings;

    /**
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
     * @return void
     */
    public function injectConfigurationManager(
        \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
    ) {
        $this->configurationManager = $configurationManager;
        $this->settings = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
    }

    /**
     * @param string $pObj
     * @param string $actionMethodName
     * @param array $preparedArguments
     */
    public function getCacheEntryForActionMethodResponse($pObj, $actionMethodName, $preparedArguments)
    {
        if (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] != 'no-cache') {
            $action = str_replace('Action', '', $actionMethodName);
            $controller = $this->objectManager->get($pObj);

            if ($controller instanceof ApiController && ($action === 'list' || $action === 'show')) {
                // we should not use this class anymore, because we just create it to check if RestController was used
                unset($controller);

                $cacheIdentifier = sha1(GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL'));

                if ($cacheIdentifier) {
                    /** @var FrontendInterface $cache */
                    $cache = GeneralUtility::makeInstance(CacheManager::class)->getCache('cache_pages');

                    $content = $cache->get($cacheIdentifier);

                    if ($content != false) {
                        /** @var Response $response */
                        $response = $this->objectManager->get(Response::class);
                        $response->setHeader('Content-Type', 'application/json');
                        $response->setContent($content);
                        $response->send();
                        exit;
                    }
                }
            }
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     * @throws \Exception
     */
    public function setCacheEntryForActionMethodResponse(Request $request, Response $response)
    {
        $action = $request->getControllerActionName();
        $controller = $this->objectManager->get($request->getControllerObjectName());

        if ($controller instanceof ApiController && ($action === 'list' || $action === 'show') && $response instanceof CacheableResponse) {
            // we should not use this class anymore, because we just create it to check if RestController was used
            unset($controller);

            $endpoint = $request->hasArgument('endpoint') ? $request->getArgument('endpoint') : null;
            if ($endpoint === null) {
                throw new \Exception('No endpoint given!', 1476453894);
            }

            $resourceType = isset($this->settings['rest']['endpoints'][$endpoint]['resource']) ? $this->settings['rest']['endpoints'][$endpoint]['resource'] : null;
            if (class_exists($resourceType) === false) {
                throw new \Exception('The resource type: "' . $resourceType . '" does not exist.', 1475830556);
            }

            /** @var \Reflection $resourceTypeReflection */
            $resourceTypeReflection = new \ReflectionClass($resourceType);
            if ($resourceTypeReflection->isSubclassOf(AbstractEntity::class) === false) {
                throw new \Exception('The resource type: "' . $resourceType . '" does not extend the class: ' . AbstractEntity::class,
                    1478862101);
            }

            $cacheTags = $response->getCacheTags();
            $cacheIdentifier = sha1($request->getRequestUri());

            /** @var FrontendInterface $cache */
            $cache = GeneralUtility::makeInstance(CacheManager::class)->getCache('cache_pages');
            $cache->set($cacheIdentifier, $response->getContent(), $cacheTags);
        }
    }

}