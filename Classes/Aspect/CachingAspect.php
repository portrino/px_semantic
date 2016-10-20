<?php
namespace Portrino\PxSemantic\Aspect;

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
use Portrino\CableDatabase\Rest\Caching\CacheableDomainObjectInterface;
use Portrino\CableDatabase\Rest\Caching\CacheableResponse;
use Portrino\CableDatabase\Rest\Caching\CacheTagServiceFactory;
use Portrino\CableDatabase\Rest\Controller\RestController;
use Portrino\PxSemantic\Controller\ApiController;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Cache\Frontend\FrontendInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Web\Request;
use TYPO3\CMS\Extbase\Mvc\Web\Response;

/**
 * Class CachingAspect
 *
 * @package Portrino\PxSemantic\Aspect
 */
class CachingAspect
{

    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
     * @inject
     */
    protected $objectManager;

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

                $requestUrl = GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL');
                $cacheIdentifier = sha1(GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL'));

                if ($cacheIdentifier) {
                    /** @var FrontendInterface $cache */
                    $cache = GeneralUtility::makeInstance(CacheManager::class)->getCache('cache_pages');

                    $content = $cache->get($cacheIdentifier);

                    if ($content != false) {
                        /** @var $response \TYPO3\CMS\Extbase\Mvc\ResponseInterface */
                        $response = $this->objectManager->get(\TYPO3\CMS\Extbase\Mvc\Web\Response::class);
                        $response->setContent($content);
                        $response->send();
                        exit;
                    }
                }
            }
        }
    }

    /**
     * @param \TYPO3\CMS\Extbase\Mvc\Request $request
     * @param \TYPO3\CMS\Extbase\Mvc\Response $response
     */
    public function setCacheEntryForActionMethodResponse(Request $request, Response $response)
    {
        $action = $request->getControllerActionName();
        $controller = $this->objectManager->get($request->getControllerObjectName());

        if ($controller instanceof ApiController && ($action === 'list' || $action === 'show')) {
            // we should not use this class anymore, because we just create it to check if RestController was used
            unset($controller);

            $cacheIdentifier = sha1($request->getRequestUri());

            /** @var FrontendInterface $cache */
            $cache = GeneralUtility::makeInstance(CacheManager::class)->getCache('cache_pages');
            $cache->set($cacheIdentifier, $response->getContent());
        }
    }

}