<?php
namespace Portrino\PxSemantic\Core;

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

/**
 * Class Bootstrap
 *
 * This class extends the \TYPO3\CMS\Extbase\Core\Bootstrap class to enable set of an entity id via TS
 *
 * @package Portrino\PxSemantic\Core
 */
class Bootstrap extends \TYPO3\CMS\Extbase\Core\Bootstrap
{

    /**
     * @var \TYPO3\CMS\Extbase\Service\TypoScriptService
     */
    protected $typoScriptService;

    /**
     * Explicitly initializes all necessary Extbase objects by invoking the various initialize* methods.
     *
     * Usually this method is only called from unit tests or other applications which need a more fine grained control over
     * the initialization and request handling process. Most other applications just call the run() method.
     *
     * @param array $configuration The TS configuration array
     *
     * @throws \RuntimeException
     * @return void
     * @see run()
     * @api
     */
    public function initialize($configuration)
    {
        parent::initialize($configuration);

        $this->initializeTypoScriptService();
    }

    /**
     * Initializes the TypoScriptService
     *
     * @return void
     * @see initialize()
     */
    protected function initializeTypoScriptService()
    {
        $this->typoScriptService = $this->objectManager->get(\TYPO3\CMS\Extbase\Service\TypoScriptService::class);
    }

    /**
     * Runs the the Extbase Framework by resolving an appropriate Request Handler and passing control to it.
     * If the Framework is not initialized yet, it will be initialized.
     *
     *
     *
     * @param string $content The content. Not used
     * @param array $configuration The TS configuration array
     *
     * @return string $content The processed content
     * @api
     */
    public function run($content, $configuration)
    {

        $this->initialize($configuration);

        if (isset($configuration['settings.']['entity.'])) {
            $typoScriptArray = $configuration['settings.']['entity.'];
            $plainArray = $this->typoScriptService->convertTypoScriptArrayToPlainArray($configuration['settings.']['entity.']);

            if (isset($plainArray['id']) && is_array($plainArray['id'])) {
                if (is_array($plainArray['id']) && array_key_exists('_typoScriptNodeValue', $plainArray['id'])) {
                    $value = $this->cObj->cObjGetSingle($typoScriptArray['id'], $typoScriptArray['id' . '.']);

                    if ((int)$value > 0) {
                        $configuration['settings.']['entity.']['id'] = $value;
                        unset($configuration['settings.']['entity.']['id.']);

                        /**
                         * reinitialize configuration to override settings
                         */
                        $this->initializeConfiguration($configuration);
                    }

                }
            }
        }

        return $this->handleRequest();
    }

}
