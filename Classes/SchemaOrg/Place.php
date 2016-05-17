<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Entities that have a somewhat fixed, physical extension.
 *
 * @see http://schema.org/Place Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
abstract class Place extends Thing {

    /**
     * @var PostalAddress Physical address of the item.
     */
    private $address;

    /**
     * @var AggregateRating The overall rating, based on a collection of reviews or ratings, of the item.
     */
    private $aggregateRating;

    /**
     * @var string A short textual code (also called "store code") that uniquely identifies a place of business. The code is typically assigned by the parentOrganization and used in structured URLs.
     *
     *             For example, in the URL http://www.starbucks.co.uk/store-locator/etc/detail/3047 the code "3047" is a branchCode for a particular branch.
     */
    private $branchCode;

    /**
     * @var string The [Global Location Number](http://www.gs1.org/gln) (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.
     */
    private $globalLocationNumber;

    /**
     * Sets address.
     *
     * @param PostalAddress $address
     *
     * @return $this
     */
    public function setAddress(PostalAddress $address = NULL) {
        $this->address = $address;

        return $this;
    }

    /**
     * Gets address.
     *
     * @return PostalAddress
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Sets aggregateRating.
     *
     * @param AggregateRating $aggregateRating
     *
     * @return $this
     */
    public function setAggregateRating(AggregateRating $aggregateRating = NULL) {
        $this->aggregateRating = $aggregateRating;

        return $this;
    }

    /**
     * Gets aggregateRating.
     *
     * @return AggregateRating
     */
    public function getAggregateRating() {
        return $this->aggregateRating;
    }

    /**
     * Sets branchCode.
     *
     * @param string $branchCode
     *
     * @return $this
     */
    public function setBranchCode($branchCode) {
        $this->branchCode = $branchCode;

        return $this;
    }

    /**
     * Gets branchCode.
     *
     * @return string
     */
    public function getBranchCode() {
        return $this->branchCode;
    }

    /**
     * Sets globalLocationNumber.
     *
     * @param string $globalLocationNumber
     *
     * @return $this
     */
    public function setGlobalLocationNumber($globalLocationNumber) {
        $this->globalLocationNumber = $globalLocationNumber;

        return $this;
    }

    /**
     * Gets globalLocationNumber.
     *
     * @return string
     */
    public function getGlobalLocationNumber() {
        return $this->globalLocationNumber;
    }
}
