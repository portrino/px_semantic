<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * The average rating based on multiple ratings or reviews.
 *
 * @see http://schema.org/AggregateRating Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class AggregateRating extends Rating {

    /**
     * @var int
     */
    private $id;

    /**
     * @var int The count of total number of ratings.
     */
    private $ratingCount;

    /**
     * Sets id.
     *
     * @param int $id
     *
     * @return $this
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Sets ratingCount.
     *
     * @param int $ratingCount
     *
     * @return $this
     */
    public function setRatingCount($ratingCount) {
        $this->ratingCount = $ratingCount;

        return $this;
    }

    /**
     * Gets ratingCount.
     *
     * @return int
     */
    public function getRatingCount() {
        return $this->ratingCount;
    }
}
