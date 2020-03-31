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
use Portrino\PxSemantic\Entity\EntityInterface;
use Portrino\PxSemantic\Mvc\View\JsonLdView\JsonLdMarkupView;
use Portrino\PxSemantic\Processor\ProcessorInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\JsonView;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

/**
 * Class EntityController
 *
 * @package Portrino\PxSemantic\Controller
 */
class EntityController extends ActionController
{

    /**
     * @var JsonLdMarkupView
     */
    protected $view;

    /**
     * @var string
     */
    protected $defaultViewObjectName = JsonLdMarkupView::class;

    /**
     * @param ViewInterface $view
     */
    protected function initializeView(ViewInterface $view)
    {
        if ($view instanceof JsonView) {
            $configuration = [
                'entity' => []
            ];
            $view->setConfiguration($configuration);
            $view->setVariablesToRender(['entity']);
        }
        parent::initializeView($view);
    }

    /**
     * action render
     */
    public function renderAction()
    {
        /**
         * take the the className from className config of entity object, otherwise take the _typoScriptNodeValue for backwards compatibility
         */
        $entityClassName = (isset($this->settings['entity']['className'])) ? $this->settings['entity']['className'] : $this->settings['entity']['_typoScriptNodeValue'];

        if ($entityClassName != null) {
            /** @var EntityInterface $entity */
            $entity = $this->objectManager->get($entityClassName);
            foreach ($this->settings['processors'] as $key => $processorConfiguration) {

                /** @var ProcessorInterface $processor */
                $processor = $this->objectManager->get($processorConfiguration['className']);

                $settings = isset($processorConfiguration['settings']) ? $processorConfiguration['settings'] : [];
                $processor->process($entity, $settings);
            }
            
            if ($entity) {
                $this->view->assign('entity', $entity);
            }
        }

    }

}
