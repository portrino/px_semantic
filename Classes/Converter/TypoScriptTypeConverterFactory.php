<?php
namespace Portrino\PxSemantic\Converter;

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
use TYPO3\CMS\Core\SingletonInterface;

/**
 * Class TypoScriptTypeConverterFactory
 *
 * @package Portrino\PxSemantic\Converter
 */
class TypoScriptTypeConverterFactory implements SingletonInterface
{

    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
     * @inject
     */
    protected $objectManager;

    /**
     * @param string $className
     * @return TypoScriptTypeConverterInterface|NULL
     * @throws \Exception
     */
    public function get($className = '')
    {
        $typoScriptTypeConverter = null;
        if ($className != '') {
            /**
             * for legacy reasons we check if the "old" PX_ syntax was used for custom typoscript converters
             *
             * we recommend to use the full qualified classname instead
             */
            if (!class_exists($className)) {
                switch ($className) {
                    case 'PX_SEMANTIC_ARRAY':
                        $className = ArrayConverter::class;
                        break;
                    case 'PX_DATE':
                        $className = DateTimeConverter::class;
                        break;
                    default:
                        $className = null;
                        break;
                }
            }
            if ($className != null) {
                $typoScriptTypeConverter = $this->objectManager->get($className);

                if (!$typoScriptTypeConverter instanceof TypoScriptTypeConverterInterface) {
                    throw new \Exception('The given Converter "' . $className . '" must implement \Portrino\PxSemantic\Converter\TypoScriptTypeConverterInterface',
                        1464072320);
                }
            }
        }
        return $typoScriptTypeConverter;
    }

}
