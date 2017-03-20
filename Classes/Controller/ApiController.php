<?php
namespace Portrino\PxSemantic\Controller;

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
use Portrino\PxSemantic\Domain\Repository\RestRepositoryInterface;
use Portrino\PxSemantic\Entity\EntityInterface;
use Portrino\PxSemantic\Hydra\Collection\PagedCollection;
use TYPO3\CMS\Core\Utility\ClassNamingUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Mvc\View\JsonView;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

/**
 * Class ApiController
 *
 * @package Portrino\PxSemantic\Controller
 */
class ApiController extends AbstractHydraController
{

    /**
     * Name of the action method argument which acts as the resource for the
     * RESTful controller. If an argument with the specified name is passed
     * to the controller, the show, update and delete actions can be triggered
     * automatically.
     *
     * @var string
     */
    protected $resourceArgumentName = 'uid';

    /**
     * @var string
     */
    protected $resourceType = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\Repository
     */
    protected $resourceRepository;

    /**
     * @var string
     */
    protected $entityClassName = '';

    /**
     * @var \Portrino\PxSemantic\Caching\CacheableResponse
     */
    protected $response;

    /**
     * @param ViewInterface $view
     */
    protected function initializeView(ViewInterface $view)
    {
        if ($view instanceof JsonView) {

            if ($this->request->getControllerActionName() === 'list' || $this->request->getControllerActionName() === 'show') {
                $configuration = [
                    'collection' => [
                        '_only' => [
                            'id',
                            'context',
                            'type',
                            'totalItems',
                            'member',
                            'itemsPerPage',
                            'firstPage',
                            'previousPage',
                            'nextPage',
                            'lastPage'
                        ],
                        '_descend' => [
                            'member' => [
                                '_descendAll' => [
                                    '_descend' => [
                                        'datePublished' => []
                                    ]
                                ],
                            ],
                        ]
                    ],
                    'entity' => [],
                    'entryPoint' => [],
                ];
                $view->setConfiguration($configuration);
            }

        }
        parent::initializeView($view);
    }


    /**
     * Determines the action method and assures that the method exists.
     *
     * @return string The action method name
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException if the action specified in the request object does not exist (and if there's no default action either).
     */
    protected function resolveActionMethodName()
    {
        $httpRequest = $_SERVER['REQUEST_METHOD'];
        if ($this->request->getControllerActionName() === 'index') {
            $actionName = 'index';
            switch ($httpRequest) {
                case 'HEAD':
                case 'GET':

                    if ($this->request->hasArgument('endpoint') === false && $this->request->hasArgument('context') === false) {
                        $actionName = 'entryPoint';
                    } else {
                        $actionName = ($this->request->hasArgument($this->resourceArgumentName)) ? 'show' : 'list';
                        break;
                    }
                    break;
            }
            $this->request->setControllerActionName($actionName);
        }
        return parent::resolveActionMethodName();
    }

    protected function initializeAction()
    {
        parent::initializeAction(); // TODO: Change the autogenerated stub

        if ($this->actionMethodName != 'entryPointAction') {

            $endpoint = $this->request->hasArgument('endpoint') ? $this->request->getArgument('endpoint') : null;

            if ($endpoint === null) {
                throw new \Exception('No endpoint given!', 1476453894);
            }

            /**
             * take the the className from className config of entity object, otherwise take the _typoScriptNodeValue for backwards compatibility
             */
            $this->entityClassName = isset($this->settings['rest']['endpoints'][$endpoint]['entity']) ? $this->settings['rest']['endpoints'][$endpoint]['entity'] : null;
            if (class_exists($this->entityClassName) === false) {
                throw new \Exception('The entity class: "' . $this->entityClassName . '" does not exist.',
                    1475830556);
            }

            $this->resourceType = isset($this->settings['rest']['endpoints'][$endpoint]['resource']) ? $this->settings['rest']['endpoints'][$endpoint]['resource'] : null;
            if (class_exists($this->resourceType) === false) {
                throw new \Exception('The resource type: "' . $this->resourceType . '" does not exist.',
                    1475830556);
            }

            /** @var \Reflection $resourceTypeReflection */
            $resourceTypeReflection = new \ReflectionClass($this->resourceType);

            if ($resourceTypeReflection->isSubclassOf(AbstractEntity::class) === false) {
                throw new \Exception('The resource type: "' . $this->resourceType . '" does not extend the class: ' . AbstractEntity::class,
                    1478862101);
            }

            $resourceRepositoryClass = ClassNamingUtility::translateModelNameToRepositoryName($this->resourceType);

            if (class_exists($resourceRepositoryClass) === false) {
                throw new \Exception('The repository: "' . $resourceRepositoryClass . '" for resource of type: "' . $this->resourceType . '" does not exist.',
                    1475830556);
            }

            /** @var \TYPO3\CMS\Extbase\Persistence\Repository $repository */
            $this->resourceRepository = $this->objectManager->get($resourceRepositoryClass);
        }
    }

    /**
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
     */
    protected function mapRequestArgumentsToControllerArguments()
    {
        try {
            parent::mapRequestArgumentsToControllerArguments();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     *
     */
    public function entryPointAction()
    {
        $entryPoint = [
            '@context' => $this->hydraIriBuilder->iriForContext('Entrypoint'),
            '@id' => $this->hydraIriBuilder->iriForEntrypoint(),
            '@type' => 'EntryPoint'
        ];

        $endpoints = $this->settings['rest']['endpoints'];

        foreach ($endpoints as $endpoint => $endpointConfiguration) {
            $entryPoint[$endpoint] = $this->hydraIriBuilder->iriFor($endpoint);
        };

        $this->view->setVariablesToRender(['entryPoint']);
        $this->view->assign('entryPoint', $entryPoint);
    }

    /**
     * @param string $endpoint
     */
    public function listAction($endpoint = '')
    {
        $offset = (GeneralUtility::_GET('offset') != null) ? (int)GeneralUtility::_GET('offset') : 0;
        $limit = (GeneralUtility::_GET('limit') != null) ? (int)GeneralUtility::_GET('limit') : 10;
        $constraint = (GeneralUtility::_GET('constraint') != null) ? (string)GeneralUtility::_GET('constraint') : '';

        if ($this->resourceRepository instanceof RestRepositoryInterface) {
            $domainObjects = $this->resourceRepository->findByOffsetAndLimitAndConstraint($offset, $limit,
                $constraint)->toArray();
            $totalItems = $this->resourceRepository->countByConstraint($constraint);
        } else {
            $domainObjects = $this->resourceRepository->findAll();
            $totalItems = $this->resourceRepository->countAll();
        }

        /** @var PagedCollection $pagedCollection */
        $pagedCollection = $this->objectManager->get(PagedCollection::class);
        $pagedCollection->setId($this->hydraIriBuilder->iriFor($endpoint, $offset, $limit));

        $pagedCollection->setItemsPerPage($limit);
        $pagedCollection->setFirstPage($this->hydraIriBuilder->iriForFirstPage($endpoint, $limit, $constraint));
        $pagedCollection->setPreviousPage($this->hydraIriBuilder->iriForPreviousPage($endpoint, $offset, $limit,
            $constraint));
        $pagedCollection->setNextPage($this->hydraIriBuilder->iriForNextPage($endpoint, $offset, $limit, $constraint));
        $pagedCollection->setLastPage($this->hydraIriBuilder->iriForLastPage($endpoint, $totalItems, $limit,
            $constraint));

        /** @var AbstractEntity $domainObject */
        foreach ($domainObjects as $domainObject) {
            /** @var EntityInterface $entity */
            $entity = $this->objectManager->get($this->entityClassName);

            foreach ($this->settings['rest']['endpoints'][$endpoint]['processors'] as $processorConfiguration) {
                /** @var \Portrino\PxSemantic\Processor\ProcessorInterface $processor */
                $processor = $this->objectManager->get($processorConfiguration['className']);
                $settings = isset($processorConfiguration['settings']) ? $processorConfiguration['settings'] : [];
                $processor->process($entity, $settings, $domainObject->getUid());
            }

            $entity->setId($this->hydraIriBuilder->iriForUid($endpoint, $domainObject->getUid()));

            $pagedCollection->addMember($entity);
        }

        $pagedCollection->setTotalItems($totalItems);

        if ($this->response instanceof CacheableResponse) {
            $this->response->setResource($domainObjects);
        }

        $this->view->setVariablesToRender(['collection']);
        $this->view->assign('collection', $pagedCollection);
    }

    /**
     * @param string $endpoint
     * @param int $uid
     *
     * @throws \Exception
     */
    public function showAction($endpoint = '', $uid = 0)
    {

        /** @var AbstractEntity|null $domainObject */
        $domainObject = $this->resourceRepository->findByUid($uid);

        if ($domainObject != null) {
            /** @var EntityInterface $entity */
            $entity = $this->objectManager->get($this->entityClassName);
            foreach ($this->settings['rest']['endpoints'][$endpoint]['processors'] as $processorConfiguration) {
                /** @var \Portrino\PxSemantic\Processor\ProcessorInterface $processor */
                $processor = $this->objectManager->get($processorConfiguration['className']);
                $settings = isset($processorConfiguration['settings']) ? $processorConfiguration['settings'] : [];
                $processor->process($entity, $settings, $domainObject->getUid());
            }

            $iri = $this->hydraIriBuilder->iriForUid($endpoint, $domainObject->getUid());
            $entity->setId($iri);

            if ($this->response instanceof CacheableResponse) {
                $this->response->setResource($domainObjects);
            }
        }

        $this->view->setVariablesToRender(['entity']);
        $this->view->assign('entity', $entity);
    }

}