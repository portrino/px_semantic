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
use TYPO3\CMS\Core\Utility\ArrayUtility;
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
                    'label' => 'events',
                    'description' => 'The ' . $endpoint . ' collection',
                    'domain' => 'vocab:EntryPoint',
                    'range' => 'vocab:Collection',
                    'supportedOperation' => [
                        0 => [
                            '@id' => '_:' . $endpoint . '_collection_retrieve',
                            '@type' => 'hydra:Operation',
                            'method' => 'GET',
                            'label' => 'Retrieves all entities of the entity',
                            'description' => null,
                            'expects' => null,
                            'returns' => 'vocab:Collection',
                            'statusCodes' => [],
                        ],
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

            $supportedClasses[] = [
                '@id' => $entity->getContext() . $entity->getType(),
                '@type' => 'hydra:Class',
                'hydra:title' => $entity->getType(),
                'hydra:description' => null,
                'supportedOperation' => [
                    0 => [
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
                'supportedProperty' => [
                    0 => [
                        'property' => 'http://schema.org/name',
                        'hydra:title' => 'name',
                        'hydra:description' => 'The name of the entity',
                        'required' => true,
                        'readonly' => false,
                        'writeonly' => false,
                    ]
                ]
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
                        0 => [
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
                    '@id' => 'http://www.w3.org/ns/hydra/core#Collection',
                    '@type' => 'hydra:Class',
                    'hydra:title' => 'Collection',
                    'hydra:description' => null,
                    'supportedOperation' => [],
                    'supportedProperty' => [
                        0 => [
                            'property' => 'http://www.w3.org/ns/hydra/core#member',
                            'hydra:title' => 'members',
                            'hydra:description' => 'The members of this collection.',
                            'required' => null,
                            'readonly' => true,
                            'writeonly' => false,
                        ]
                    ]
                ],
            ],
        ];

        ArrayUtility::mergeRecursiveWithOverrule($vocabulary['supportedClass'], $supportedClasses);

        $this->view->setVariablesToRender(['vocabulary']);
        $this->view->assign('vocabulary', $vocabulary);
    }

}