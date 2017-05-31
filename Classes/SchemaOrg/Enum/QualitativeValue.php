<?php

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

namespace Portrino\PxSemantic\SchemaOrg\Enum;

use MyCLabs\Enum\Enum;

/**
 * A predefined value for a product characteristic, e.g. the power cord plug type 'US' or the garment sizes 'S', 'M', 'L', and 'XL'.
 *
 * @see http://schema.org/QualitativeValue Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class QualitativeValue extends Enum
{
    /**
     * @var string This ordering relation for qualitative values indicates that the subject is equal to the object
     */
    private $equal;

    /**
     * @var string This ordering relation for qualitative values indicates that the subject is greater than the object
     */
    private $greater;

    /**
     * @var string This ordering relation for qualitative values indicates that the subject is greater than or equal to the object
     */
    private $greaterOrEqual;

    /**
     * @var string This ordering relation for qualitative values indicates that the subject is lesser than the object
     */
    private $lesser;

    /**
     * @var string This ordering relation for qualitative values indicates that the subject is lesser than or equal to the object
     */
    private $lesserOrEqual;

    /**
     * @var string This ordering relation for qualitative values indicates that the subject is not equal to the object
     */
    private $nonEqual;

    /**
     * Sets equal.
     *
     * @param string $equal
     *
     * @return $this
     */
    public function setEqual($equal)
    {
        $this->equal = $equal;

        return $this;
    }

    /**
     * Gets equal.
     *
     * @return string
     */
    public function getEqual()
    {
        return $this->equal;
    }

    /**
     * Sets greater.
     *
     * @param string $greater
     *
     * @return $this
     */
    public function setGreater($greater)
    {
        $this->greater = $greater;

        return $this;
    }

    /**
     * Gets greater.
     *
     * @return string
     */
    public function getGreater()
    {
        return $this->greater;
    }

    /**
     * Sets greaterOrEqual.
     *
     * @param string $greaterOrEqual
     *
     * @return $this
     */
    public function setGreaterOrEqual($greaterOrEqual)
    {
        $this->greaterOrEqual = $greaterOrEqual;

        return $this;
    }

    /**
     * Gets greaterOrEqual.
     *
     * @return string
     */
    public function getGreaterOrEqual()
    {
        return $this->greaterOrEqual;
    }

    /**
     * Sets lesser.
     *
     * @param string $lesser
     *
     * @return $this
     */
    public function setLesser($lesser)
    {
        $this->lesser = $lesser;

        return $this;
    }

    /**
     * Gets lesser.
     *
     * @return string
     */
    public function getLesser()
    {
        return $this->lesser;
    }

    /**
     * Sets lesserOrEqual.
     *
     * @param string $lesserOrEqual
     *
     * @return $this
     */
    public function setLesserOrEqual($lesserOrEqual)
    {
        $this->lesserOrEqual = $lesserOrEqual;

        return $this;
    }

    /**
     * Gets lesserOrEqual.
     *
     * @return string
     */
    public function getLesserOrEqual()
    {
        return $this->lesserOrEqual;
    }

    /**
     * Sets nonEqual.
     *
     * @param string $nonEqual
     *
     * @return $this
     */
    public function setNonEqual($nonEqual)
    {
        $this->nonEqual = $nonEqual;

        return $this;
    }

    /**
     * Gets nonEqual.
     *
     * @return string
     */
    public function getNonEqual()
    {
        return $this->nonEqual;
    }
}
