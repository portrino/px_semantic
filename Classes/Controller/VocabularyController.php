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

use Portrino\PxSemantic\Domain\Repository\RestRepositoryInterface;
use Portrino\PxSemantic\Entity\EntityInterface;
use Portrino\PxSemantic\Hydra\Collection;
use Portrino\PxSemantic\Mvc\View\JsonLdView;
use Portrino\PxSemantic\SchemaOrg\Thing;
use TYPO3\CMS\Core\Http\ServerRequestFactory;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface;
use TYPO3\CMS\Extbase\Mvc\View\JsonView;

/**
 * Class VocabularyController
 *
 * @package Portrino\PxSemantic\Controller
 */
class VocabularyController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * @var JsonView
     */
    protected $view;

    /**
     * @var string
     */
    protected $defaultViewObjectName = JsonLdView::class;

    /**
     * @param \TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view
     */
    protected function initializeView(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view)
    {
        if ($view instanceof JsonView) {

            if ($this->request->getControllerActionName() === 'index') {
                $configuration = [
                    '$vocabulary' => []
                ];
                $view->setConfiguration($configuration);
            }

        }
        parent::initializeView($view);
    }

    protected function initializeAction()
    {
        parent::initializeAction(); // TODO: Change the autogenerated stub

        header('Link: <http://dev.kueppersbusch.de/api/structured-data-vocabulary>; rel="http://www.w3.org/ns/hydra/core#apiDocumentation"');

    }

    /**
     *
     */
    public function indexAction()
    {

        $vocabulary = [
            '@context' => [
                'vocab' => 'http://dev.kueppersbusch.de/api/structured-data-vocabulary', // @todo: generate link to vocabularyController
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
            '@id' => 'http://dev.kueppersbusch.de/api/structured-data-vocabulary',
            '@type' => 'ApiDocumentation',
            'supportedClass' => [
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
                [
                    '@id' => 'http://schema.org/Recipe',
                    '@type' => 'hydra:Class',
                    'hydra:title' => 'Recipe',
                    'hydra:description' => null,
                    'supportedOperation' => [
                        0 => [
                            '@id' => '_:recipe_retrieve',
                            '@type' => 'hydra:Operation',
                            'method' => 'GET',
                            'label' => 'Retrieves a Recipe entity',
                            'description' => null,
                            'expects' => null,
                            'returns' => 'http://schema.org/Recipe',
                            'statusCodes' => [],
                        ]
                    ],
                    'supportedProperty' => [
                        0 => [
                            'property' => 'http://schema.org/name',
                            'hydra:title' => 'name',
                            'hydra:description' => 'The recipes name',
                            'required' => true,
                            'readonly' => false,
                            'writeonly' => false,
                        ]
                    ]
                ],
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
                    'supportedProperty' => [
                        0 => [
                            'property' => [
                                '@id' => 'vocab:EntryPoint/recipes',
                                '@type' => 'hydra:Link',
                                'label' => 'events',
                                'description' => 'The recipes collection',
                                'domain' => 'vocab:EntryPoint',
                                'range' => 'vocab:Collection',
                                'supportedOperation' => [
                                    0 => [
                                        '@id' => '_:recipe_collection_retrieve',
                                        '@type' => 'hydra:Operation',
                                        'method' => 'GET',
                                        'label' => 'Retrieves all recipe entities',
                                        'description' => null,
                                        'expects' => null,
                                        'returns' => 'vocab:Collection',
                                        'statusCodes' =>[],
                                    ],
                                ],
                            ],
                            'hydra:title' => 'recipes',
                            'hydra:description' => 'The recipes collection',
                            'required' => null,
                            'readonly' => true,
                            'writeonly' => false,
                        ]
                    ]
                ]
            ]
        ];

        $this->view->setVariablesToRender(['$vocabulary']);
        $this->view->assign('$vocabulary', $vocabulary);
    }

}