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

use Portrino\PxSemantic\Mvc\View\JsonLdView;
use TYPO3\CMS\Core\Http\ServerRequestFactory;
use TYPO3\CMS\Extbase\Mvc\View\JsonView;

/**
 * Class ContextController
 *
 * @package Portrino\PxSemantic\Controller
 */
class ContextController extends AbstractHydraController
{

    /**
     * @param \TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view
     */
    protected function initializeView(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view)
    {
        if ($view instanceof JsonView) {

            if ($this->request->getControllerActionName() === 'show') {
                $configuration = [
                    'context' => []
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
                    $actionName = 'show';
                    break;
            }
            $this->request->setControllerActionName($actionName);
        }
        return parent::resolveActionMethodName();
    }

    /**
     * @param string $context
     */
    public function showAction($context = '')
    {
        if ($context === 'Entrypoint') {
            $context = [
                '@context' => [
                    'hydra' => 'http://www.w3.org/ns/hydra/core#',
                    'vocab' => $this->hydraIriBuilder->iriForVocabulary(),
                    'EntryPoint' => 'vocab:EntryPoint',
                ],
            ];

            $endpoints = $this->settings['rest']['endpoints'];

            foreach ($endpoints as $endpoint => $endpointConfiguration) {
                $context['@context'][$endpoint] = [
                    '@id' => 'vocab:EntryPoint/' . $endpoint,
                    '@type' => '@id'
                ];
            };
        }

        $this->view->setVariablesToRender(['context']);
        $this->view->assign('context', $context);
    }

}