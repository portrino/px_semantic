<?php
namespace Portrino\PxSemantic\Caching;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Utility\ArrayUtility;

/**
 * Class CacheableResponse
 *
 * @package Portrino\PxSemantic\Caching
 */
class CacheableResponse extends \TYPO3\CMS\Extbase\Mvc\Web\Response
{

    /**
     * @var AbstractEntity|array|null
     */
    protected $resource = null;

    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
     * @inject
     */
    protected $objectManager;

    /**
     * @var \Portrino\PxSemantic\Caching\CacheTag\CacheTagServiceFactory
     * @inject
     */
    protected $cacheTagServiceFactory;

    /**
     * @return array|AbstractEntity
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param array|AbstractEntity $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return string
     */
    protected function getResourceType()
    {
        $result = '';

        if (is_array($this->resource)) {
            // we can take the first one, because there should not be different domain object types within one array
            $result = get_class($this->resource[0]);
        }

        if ($this->resource instanceof AbstractEntity) {
            $result = get_class($this->resource);
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getCacheTags()
    {
        $cacheTags = [];

        if ($this->resource != null) {

            $cacheTagService = $this->cacheTagServiceFactory->getCacheTagService($this->getResourceType());

            if ($cacheTagService != null) {

                /**
                 * get the cache tags for a list of resources
                 */
                if (is_array($this->resource)) {
                    foreach ($this->resource as $item) {
                        $cacheTags = ArrayUtility::arrayMergeRecursiveOverrule($cacheTags,
                            $cacheTagService->getTags($item));
                    }
                }

                /**
                 * get the cache tags for a single resource
                 */
                if ($this->resource instanceof AbstractEntity) {
                    $cacheTags = ArrayUtility::arrayMergeRecursiveOverrule($cacheTags,
                        $cacheTagService->getTags($this->resource));
                }

            }
        }

        return $cacheTags;
    }
}
