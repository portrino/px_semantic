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

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A rating is an evaluation on a numeric scale, such as 1 to 5 stars.
 *
 * @see http://schema.org/Rating Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
abstract class Rating extends Intangible
{
    /**
     * @var float The highest value allowed in this rating system. If bestRating is omitted, 5 is assumed
     */
    private $bestRating;

    /**
     * @var float
     */
    private $ratingCount;

    /**
     * @var float The rating for the content
     */
    private $ratingValue;

    /**
     * @var float The lowest value allowed in this rating system. If worstRating is omitted, 1 is assumed
     */
    private $worstRating;

    /**
     * Sets bestRating.
     *
     * @param float $bestRating
     *
     * @return $this
     */
    public function setBestRating($bestRating)
    {
        $this->bestRating = $bestRating;

        return $this;
    }

    /**
     * Gets bestRating.
     *
     * @return float
     */
    public function getBestRating()
    {
        return $this->bestRating;
    }

    /**
     * Sets ratingCount.
     *
     * @param float $ratingCount
     *
     * @return $this
     */
    public function setRatingCount($ratingCount)
    {
        $this->ratingCount = $ratingCount;

        return $this;
    }

    /**
     * Gets ratingCount.
     *
     * @return float
     */
    public function getRatingCount()
    {
        return $this->ratingCount;
    }

    /**
     * Sets ratingValue.
     *
     * @param float $ratingValue
     *
     * @return $this
     */
    public function setRatingValue($ratingValue)
    {
        $this->ratingValue = $ratingValue;

        return $this;
    }

    /**
     * Gets ratingValue.
     *
     * @return float
     */
    public function getRatingValue()
    {
        return $this->ratingValue;
    }

    /**
     * Sets worstRating.
     *
     * @param float $worstRating
     *
     * @return $this
     */
    public function setWorstRating($worstRating)
    {
        $this->worstRating = $worstRating;

        return $this;
    }

    /**
     * Gets worstRating.
     *
     * @return float
     */
    public function getWorstRating()
    {
        return $this->worstRating;
    }
}
