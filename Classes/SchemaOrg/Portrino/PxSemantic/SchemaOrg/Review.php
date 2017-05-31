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
 * A review of an item - for example, of a restaurant, movie, or store.
 *
 * @see http://schema.org/Review Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Review extends CreativeWork
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Thing The item that is being reviewed/rated
     */
    private $itemReviewed;

    /**
     * @var string The actual body of the review
     */
    private $reviewBody;

    /**
     * @var Rating The rating given in this review. Note that reviews can themselves be rated. The ```reviewRating``` applies to rating given by the review. The \[\[aggregateRating\]\] property applies to the review itself, as a creative work
     */
    private $reviewRating;

    /**
     * Sets id.
     *
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets itemReviewed.
     *
     * @param Thing $itemReviewed
     *
     * @return $this
     */
    public function setItemReviewed(Thing $itemReviewed = null)
    {
        $this->itemReviewed = $itemReviewed;

        return $this;
    }

    /**
     * Gets itemReviewed.
     *
     * @return Thing
     */
    public function getItemReviewed()
    {
        return $this->itemReviewed;
    }

    /**
     * Sets reviewBody.
     *
     * @param string $reviewBody
     *
     * @return $this
     */
    public function setReviewBody($reviewBody)
    {
        $this->reviewBody = $reviewBody;

        return $this;
    }

    /**
     * Gets reviewBody.
     *
     * @return string
     */
    public function getReviewBody()
    {
        return $this->reviewBody;
    }

    /**
     * Sets reviewRating.
     *
     * @param Rating $reviewRating
     *
     * @return $this
     */
    public function setReviewRating(Rating $reviewRating = null)
    {
        $this->reviewRating = $reviewRating;

        return $this;
    }

    /**
     * Gets reviewRating.
     *
     * @return Rating
     */
    public function getReviewRating()
    {
        return $this->reviewRating;
    }
}
