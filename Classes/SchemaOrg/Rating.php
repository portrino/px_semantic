<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A rating is an evaluation on a numeric scale, such as 1 to 5 stars.
 *
 * @see http://schema.org/Rating Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
abstract class Rating extends Intangible {

    /**
     * @var string The highest value allowed in this rating system. If bestRating is omitted, 5 is assumed.
     */
    protected $bestRating;

    /**
     * @var string The rating for the content.
     */
    protected $ratingValue;

    /**
     * @var string The lowest value allowed in this rating system. If worstRating is omitted, 1 is assumed.
     */
    protected $worstRating;

    /**
     * @var string
     */
    protected $ratingCount;

    /**
     * Sets bestRating.
     *
     * @param string $bestRating
     *
     * @return $this
     */
    public function setBestRating($bestRating) {
        $this->bestRating = $bestRating;

        return $this;
    }

    /**
     * Gets bestRating.
     *
     * @return string
     */
    public function getBestRating() {
        return $this->bestRating;
    }

    /**
     * Sets ratingValue.
     *
     * @param string $ratingValue
     *
     * @return $this
     */
    public function setRatingValue($ratingValue) {
        $this->ratingValue = $ratingValue;

        return $this;
    }

    /**
     * Gets ratingValue.
     *
     * @return string
     */
    public function getRatingValue() {
        return $this->ratingValue;
    }

    /**
     * Sets worstRating.
     *
     * @param string $worstRating
     *
     * @return $this
     */
    public function setWorstRating($worstRating) {
        $this->worstRating = $worstRating;

        return $this;
    }

    /**
     * Gets worstRating.
     *
     * @return string
     */
    public function getWorstRating() {
        return $this->worstRating;
    }

    /**
     * Sets ratingCount.
     *
     * @param string $ratingCount
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
     * @return string
     */
    public function getRatingCount() {
        return $this->ratingCount;
    }
}
