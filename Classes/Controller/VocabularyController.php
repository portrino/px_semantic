<?php
namespace Portrino\PxSemantic\Controller;

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

use Portrino\PxSemantic\Entity\EntityInterface;
use TYPO3\CMS\Core\Http\ServerRequestFactory;
use TYPO3\CMS\Extbase\Mvc\View\JsonView;

/**
 * Class VocabularyController
 *
 * @package Portrino\PxSemantic\Controller
 */
class VocabularyController extends AbstractHydraController
{

    /**
     * @param \TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view
     */
    protected function initializeView(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view)
    {
        if ($view instanceof JsonView) {

            if ($this->request->getControllerActionName() === 'index') {
                $configuration = [
                    'vocabulary' => []
                ];
                $view->setConfiguration($configuration);
            }

        }
        parent::initializeView($view);
    }

    /**
     * @throws \TYPO3\CMS\Fluid\Exception
     */
    public function indexAction()
    {

        $endpoints = $this->settings['rest']['endpoints'];

        foreach ($endpoints as $endpoint => $endpointConfiguration) {

            $entryPoints[] = [
                'property' => [
                    '@id' => 'vocab:EntryPoint/' . $endpoint,
                    '@type' => 'hydra:Link',
                    'label' => $endpoint,
                    'description' => 'The ' . $endpoint . ' collection',
                    'domain' => 'vocab:EntryPoint',
                    'range' => 'vocab:PagedCollection',
                    'supportedOperation' => [
                        [
                            '@id' => '_:' . $endpoint . '_collection_retrieve',
                            '@type' => 'hydra:Operation',
                            'method' => 'GET',
                            'hydra:title' => 'Retrieves the collection of ' . $endpoint,
                            'label' => 'Retrieves the collection of ' . $endpoint,
                            'expects' => null,
                            'returns' => 'vocab:PagedCollection',
                            'statusCodes' => [],
                        ]
                    ],
                ],
                'hydra:title' => $endpoint,
                'hydra:description' => 'The ' . $endpoint . ' collection',
                'required' => null,
                'readonly' => true,
                'writeonly' => false,
            ];

            /**
             * take the the className from className config of entity object, otherwise take the _typoScriptNodeValue for backwards compatibility
             */
            $entityClassName = isset($endpointConfiguration['entity']) ? $endpointConfiguration['entity'] : null;
            if (!class_exists($entityClassName)) {
                throw new \TYPO3\CMS\Fluid\Exception('The entity class: "' . $entityClassName . '" does not exist.',
                    1475830556);
            }

            /** @var EntityInterface $entity */
            $entity = $this->objectManager->get($entityClassName);

            $supportedProperties = [];
            $reflectionClass = new \ReflectionClass($entityClassName);
            $properties = $reflectionClass->getProperties();
            /** @var \ReflectionProperty $reflectionProperty */
            foreach ($properties as $reflectionProperty) {
                $tagValues = $this->reflectionService->getPropertyTagValues($reflectionProperty->getDeclaringClass()->getName(),
                    $reflectionProperty->getName(), 'var');
                $description = (isset($tagValues[0])) ? $tagValues[0] : '';

                if (preg_match('/@var\s+([^\s]+)/', $reflectionProperty->getDocComment(), $matches)) {
                    list(, $type) = $matches;

                    $description = trim(preg_replace('/' . preg_quote($type, '/') . '/', '', $description, 1));
                    $type = str_replace('\\', '', $type);

                    switch ($type) {
                        case 'string':
                            $propertyType = 'Text';
                            break;
                        case 'int':
                            $propertyType = 'Number';
                            break;
                        case 'boolean':
                            $propertyType = 'Boolean';
                            break;
                        default:
                            $propertyType = $type;
                    }
                }

                $supportedProperties[] = [
                    '@type' => 'hydra:SupportedProperty',
                    'property' => [
                        '@id' => $entity->getContext() . $reflectionProperty->getName(),
                        '@type' => 'rdf:Property',
                        'label' => $reflectionProperty->getName(),
                        'domain' => $entity->getContext() . $entity->getType(),
                        'range' => $entity->getContext() . $propertyType
                    ],
                    'label' => $reflectionProperty->getName(),
                    'hydra:title' => $reflectionProperty->getName(),
                    'hydra:description' => $description,
                    'required' => false,
                    'readonly' => true,
                    'writeonly' => false,
                ];
            }

            $supportedClasses[] = [
                '@id' => $entity->getContext() . $entity->getType(),
                '@type' => 'hydra:Class',
                'hydra:title' => $entity->getType(),
                'hydra:description' => null,
                'supportedOperation' => [
                    [
                        '@id' => '_:' . $endpoint . '_retrieve',
                        '@type' => 'hydra:Operation',
                        'method' => 'GET',
                        'label' => 'Retrieves a ' . $entity->getType() . ' entity',
                        'description' => null,
                        'expects' => null,
                        'returns' => $entity->getContext() . $entity->getType(),
                        'statusCodes' => [],
                    ]
                ],
                'supportedProperty' => $supportedProperties
            ];

        };

        $vocabulary = [
            '@context' => [
                'vocab' => $this->hydraUtility->getVocabularyIri(),
                'hydra' => 'http://www.w3.org/ns/hydra/core#',
                'ApiDocumentation' => 'hydra:ApiDocumentation',
                'property' => [
                    '@id' => 'hydra:property',
                    '@type' => '@id',
                ],
                'readonly' => 'hydra:readonly',
                'writeonly' => 'hydra:writeonly',
                'supportedClass' => 'hydra:supportedClass',
                'supportedProperty' => 'hydra:supportedProperty',
                'supportedOperation' => 'hydra:supportedOperation',
                'method' => 'hydra:method',
                'expects' => [
                    '@id' => 'hydra:expects',
                    '@type' => '@id',
                ],
                'returns' => [
                    '@id' => 'hydra:returns',
                    '@type' => '@id',
                ],
                'statusCodes' => 'hydra:statusCodes',
                'code' => 'hydra:statusCode',
                'rdf' => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#',
                'rdfs' => 'http://www.w3.org/2000/01/rdf-schema#',
                'xmls' => 'http://www.w3.org/2001/XMLSchema#',
                'owl' => 'http://www.w3.org/2002/07/owl#',
                'label' => 'rdfs:label',
                'description' => 'rdfs:comment',
                'domain' => [
                    '@id' => 'rdfs:domain',
                    '@type' => '@id',
                ],
                'range' => [
                    '@id' => 'rdfs:range',
                    '@type' => '@id',
                ],
                'subClassOf' => [
                    '@id' => 'rdfs:subClassOf',
                    '@type' => '@id',
                ],
                'returns' => [
                    '@id' => 'hydra:returns',
                    '@type' => '@id'
                ]
            ],
            '@id' => $this->hydraUtility->getVocabularyIri(),
            '@type' => 'ApiDocumentation',
            'supportedClass' => [
                [
                    '@id' => 'vocab:EntryPoint',
                    '@type' => 'hydra:Class',
                    'subClassOf' => null,
                    'label' => 'EntryPoint',
                    'description' => 'The main entry point or homepage of the API.',
                    'supportedOperation' => [
                        [
                            '@id' => '_:entry_point',
                            '@type' => 'hydra:Operation',
                            'method' => 'GET',
                            'label' => 'The APIs main entry point.',
                            'description' => null,
                            'expects' => null,
                            'returns' => 'vocab:EntryPoint',
                            'statusCodes' => [],
                        ]
                    ],
                    'supportedProperty' => $entryPoints
                ],
                [
                    '@id' => 'http://www.w3.org/ns/hydra/core#PagedCollection',
                    '@type' => 'hydra:Class',
                    'label' => 'PagedCollection',
                    'hydra:title' => 'PagedCollection',
                    'hydra:description' => 'A PagedCollection is a subclass of Collection with the only difference that its members are sorted and only a subset of all members are returned in a single PagedCollection. To get the other members, the nextPage/previousPage properties have to be used.',
                    'supportedOperation' => [],
                    'supportedProperty' => [
                        [
                            '@type' => 'hydra:SupportedProperty',
                            'property' => [
                                '@id' => 'http://www.w3.org/ns/hydra/core#member',
                                '@type' => 'hydra:Link',
                                'label' => 'members',
                                'domain' => 'hydra:PagedCollection',
                                'range' => 'hydra:PagedCollection'
                            ],
                            'label' =>'members',
                            'hydra:title' => 'members',
                            'hydra:description' => 'The members of this collection.',
                            'required' => false,
                            'readonly' => true,
                            'writeonly' => false,
                        ],
                        [
                            '@type' => 'hydra:SupportedProperty',
                            'property' => [
                                '@id' => 'http://www.w3.org/ns/hydra/core#totalItems',
                                '@type' => 'rdf:Property',
                                'label' => 'total items',
                                'domain' => 'hydra:PagedCollection',
                                'range' => 'xsd:integer'
                            ],
                            'label' =>'total items',
                            'hydra:title' => 'total items',
                            'hydra:description' => 'The total number of items referenced by a collection or a set of interlinked PagedCollections.',
                            'required' => false,
                            'readonly' => true,
                            'writeonly' => false,
                        ],
                        [
                            '@type' => 'hydra:SupportedProperty',
                            'property' => [
                                '@id' => 'http://www.w3.org/ns/hydra/core#itemsPerPage',
                                '@type' => 'rdf:Property',
                                'label' => 'items per page',
                                'domain' => 'hydra:PagedCollection',
                                'range' => 'xsd:integer'
                            ],
                            'label' =>'items per page',
                            'hydra:title' => 'items per page',
                            'hydra:description' => 'The maximum number of items referenced by each single PagedCollection in a set of interlinked PagedCollections..',
                            'required' => false,
                            'readonly' => true,
                            'writeonly' => false,
                        ],
                        [

                            '@type' => 'hydra:SupportedProperty',
                            'property' => [
                                '@id' => 'http://www.w3.org/ns/hydra/core#firstPage',
                                '@type' => 'hydra:Link',
                                'label' => 'first page',
                                'domain' => 'hydra:PagedCollection',
                                'range' => 'hydra:PagedCollection'
                            ],
                            'label' =>'first page',
                            'hydra:title' => 'first page',
                            'hydra:description' => 'The first page of an interlinked set of PagedCollections.',
                            'required' => false,
                            'readonly' => true,
                            'writeonly' => false,
                        ],
                        [
                            '@type' => 'hydra:SupportedProperty',
                            'property' => [
                                '@id' => 'http://www.w3.org/ns/hydra/core#lastPage',
                                '@type' => 'hydra:Link',
                                'label' => 'last page',
                                'domain' => 'hydra:PagedCollection',
                                'range' => 'hydra:PagedCollection'
                            ],
                            'label' =>'last page',
                            'hydra:title' => 'last page',
                            'hydra:description' => 'The last page of an interlinked set of PagedCollections.',
                            'required' => false,
                            'readonly' => true,
                            'writeonly' => false,
                        ],
                        [

                            '@type' => 'hydra:SupportedProperty',
                            'property' => [
                                '@id' => 'http://www.w3.org/ns/hydra/core#nextPage',
                                '@type' => 'hydra:Link',
                                'label' => 'next page',
                                'domain' => 'hydra:PagedCollection',
                                'range' => 'hydra:PagedCollection'
                            ],
                            'label' =>'next page',
                            'hydra:title' => 'next page',
                            'hydra:description' => 'The page following the current instance in an interlinked set of PagedCollections.',
                            'required' => false,
                            'readonly' => true,
                            'writeonly' => false,
                        ],
                        [

                            '@type' => 'hydra:SupportedProperty',
                            'property' => [
                                '@id' => 'http://www.w3.org/ns/hydra/core#previousPage',
                                '@type' => 'hydra:Link',
                                'label' => 'previous page',
                                'domain' => 'hydra:PagedCollection',
                                'range' => 'hydra:PagedCollection'
                            ],
                            'label' =>'previous page',
                            'hydra:title' => 'previous page',
                            'hydra:description' => 'The page preceding the current instance in an interlinked set of PagedCollections.',
                            'required' => false,
                            'readonly' => true,
                            'writeonly' => false,
                        ]
                    ]
                ]
            ],
        ];

        foreach ($supportedClasses as $supportedClass) {
            array_push($vocabulary['supportedClass'], $supportedClass);
        }

        $this->view->setVariablesToRender(['vocabulary']);
        $this->view->assign('vocabulary', $vocabulary);
    }

}