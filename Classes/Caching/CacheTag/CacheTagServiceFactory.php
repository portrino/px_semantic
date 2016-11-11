<?php
namespace Portrino\PxSemantic\Caching\CacheTag;

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

use Portrino\PxSemantic\Caching\CacheTag\CacheTagService\PagesCacheTagService;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface;

/**
 * Class CacheTagServiceFactory
 * @package Portrino\PxSemantic\Caching\CacheTag
 */
class CacheTagServiceFactory implements SingletonInterface
{

    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
     * @inject
     */
    protected $objectManager;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapFactory
     * @inject
     */
    protected $dataMapFactory;

    /**
     * @param string $modelName
     *
     * @return null|\Portrino\PxSemantic\Caching\CacheTag\CacheTagServiceInterface
     */
    public function getCacheTagService($modelName) {
        $cacheTagService = null;
        /** @var string $tableName */
        $tableName = $this->dataMapFactory->buildDataMap($modelName)->getTableName();
        // try to get it from tableName
        $cacheTagService = $this->getCacheTagServiceByTableName($tableName);

        if ($cacheTagService === null) {
            $cacheTagService = $this->getCacheTagServiceRecursive($modelName);
        }
        return $cacheTagService;
    }

    /**
     * @param string $tableName
     */
    protected function getCacheTagServiceByTableName($tableName = '') {
        switch ($tableName) {
            case 'pages':
                $cacheTagService = $this->objectManager->get(PagesCacheTagService::class);
                break;
            case 'tt_content':
                // $cacheTagService = $this->objectManager->get(ContentCacheTagService::class);
                break;
        }
        return $cacheTagService;
    }

    /**
     * @param string $modelName
     *
     * @return null|\Portrino\PxSemantic\Caching\CacheTag\CacheTagServiceFactory
     */
    protected function getCacheTagServiceRecursive($modelName) {
        $cacheTagService = $this->getCacheTagServiceByModelName($modelName);
        if ($cacheTagService === null) {
            $reflection = new \ReflectionClass($modelName);

            $parentReflection = $reflection->getParentClass();

            if ($parentReflection != false && $parentReflection->implementsInterface(DomainObjectInterface::class) == true) {
                $cacheTagService = $this->getCacheTagServiceRecursive($reflection->getParentClass()->getName());
            }
        }
        return $cacheTagService;
    }

    /**
     * @param string $modelName
     *
     * @return null|\Portrino\PxSemantic\Caching\CacheTag\CacheTagServiceInterface
     */
    protected function getCacheTagServiceByModelName($modelName)
    {
        $result = null;
        $cacheTagServiceClassName = str_replace(
                'Portrino\\PxSemantic\\Domain\\Model\\',
                'Portrino\\PxSemantic\\Caching\\CacheTag\\CacheTagService\\',
                $modelName
            ) . 'CacheTagService';

        if (class_exists($cacheTagServiceClassName) === true) {
            /** @var CacheTagServiceInterface $result */
            $result = $this->objectManager->get($cacheTagServiceClassName);

            if ($result instanceof CacheTagServiceInterface === false) {
                throw new \Exception('"' . get_class($result) . '" must implement "' . CacheTagServiceInterface::class . '""');
            }
        }
        return $result;
    }
}
