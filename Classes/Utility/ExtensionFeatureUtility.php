<?php
namespace Portrino\PxSemantic\Utility;

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
 * Class ExtensionFeatureUtility
 * @package Portrino\PxSemantic\Utility
 */
class ExtensionFeatureUtility
{

    /**
     * checks if the given $feature is enabled within extConf
     *
     * @param string $feature
     *
     * @return boolean
     */
    public static function isFeatureEnabled($feature)
    {
        $result = false;
        $extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['px_semantic']);

        if (isset($extConf['enable' . $feature])) {
            $result = (Boolean)$extConf['enable' . $feature];
        }
        if (isset($extConf['disable' . $feature])) {
            $result = !(Boolean)$extConf['disable' . $feature];
        }
        if (isset($extConf[$feature . '.']['enabled'])) {
            $result = (Boolean)$extConf[$feature . '.']['enabled'];
        }
        if (isset($extConf[$feature . '.']['disabled'])) {
            $result = !(Boolean)$extConf[$feature . '.']['disabled'];
        }
        return $result;
    }
}
