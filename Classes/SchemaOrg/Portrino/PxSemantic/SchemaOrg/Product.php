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
 * Any offered product or service. For example: a pair of shoes; a concert ticket; the rental of a car; a haircut; or an episode of a TV show streamed online.
 *
 * @see http://schema.org/Product Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
abstract class Product extends Thing
{
    /**
     * @var PropertyValue A property-value pair representing an additional characteristics of the entitity, e.g. a product feature or another characteristic for which there is no matching property in schema.org.\\n\\nNote: Publishers should be aware that applications designed to use specific schema.org properties (e.g. http://schema.org/width, http://schema.org/color, http://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism
     */
    private $additionalProperty;

    /**
     * @var AggregateRating The overall rating, based on a collection of reviews or ratings, of the item
     */
    private $aggregateRating;

    /**
     * @var Organization The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person
     */
    private $brand;

    /**
     * @var string A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy
     */
    private $category;

    /**
     * @var string The color of the product
     */
    private $color;

    /**
     * @var QuantitativeValue The depth of the item
     */
    private $depth;

    /**
     * @var int The height of the item
     */
    private $height;

    /**
     * @var ImageObject An associated logo
     */
    private $logo;

    /**
     * @var Organization The manufacturer of the product
     */
    private $manufacturer;

    /**
     * @var string A material that something is made from, e.g. leather, wool, cotton, paper
     */
    private $material;

    /**
     * @var string The model of the product. Use with the URL of a ProductModel or a textual representation of the model identifier. The URL of the ProductModel can be from an external source. It is recommended to additionally provide strong product identifiers via the gtin8/gtin13/gtin14 and mpn properties
     */
    private $model;

    /**
     * @var string The Manufacturer Part Number (MPN) of the product, or the product to which the offer refers
     */
    private $mpn;

    /**
     * @var string The product identifier, such as ISBN. For example: ``` meta itemprop="productID" content="isbn:123-456-789" ```
     */
    private $productID;

    /**
     * @var \DateTime The date of production of the item, e.g. vehicle
     */
    private $productionDate;

    /**
     * @var \DateTime The date the item e.g. vehicle was purchased by the current owner
     */
    private $purchaseDate;

    /**
     * @var \DateTime The release date of a product or product model. This can be used to distinguish the exact variant of a product
     */
    private $releaseDate;

    /**
     * @var int The weight of the product or person
     */
    private $weight;

    /**
     * @var int The width of the item
     */
    private $width;

    /**
     * @var Offer An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event
     */
    private $offers;

    /**
     * Sets additionalProperty.
     *
     * @param PropertyValue $additionalProperty
     *
     * @return $this
     */
    public function setAdditionalProperty(PropertyValue $additionalProperty = null)
    {
        $this->additionalProperty = $additionalProperty;

        return $this;
    }

    /**
     * Gets additionalProperty.
     *
     * @return PropertyValue
     */
    public function getAdditionalProperty()
    {
        return $this->additionalProperty;
    }

    /**
     * Sets aggregateRating.
     *
     * @param AggregateRating $aggregateRating
     *
     * @return $this
     */
    public function setAggregateRating(AggregateRating $aggregateRating = null)
    {
        $this->aggregateRating = $aggregateRating;

        return $this;
    }

    /**
     * Gets aggregateRating.
     *
     * @return AggregateRating
     */
    public function getAggregateRating()
    {
        return $this->aggregateRating;
    }

    /**
     * Sets brand.
     *
     * @param Organization $brand
     *
     * @return $this
     */
    public function setBrand(Organization $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Gets brand.
     *
     * @return Organization
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Sets category.
     *
     * @param string $category
     *
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Gets category.
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets color.
     *
     * @param string $color
     *
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Gets color.
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Sets depth.
     *
     * @param QuantitativeValue $depth
     *
     * @return $this
     */
    public function setDepth(QuantitativeValue $depth = null)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * Gets depth.
     *
     * @return QuantitativeValue
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Sets height.
     *
     * @param int $height
     *
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Gets height.
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Sets logo.
     *
     * @param ImageObject $logo
     *
     * @return $this
     */
    public function setLogo(ImageObject $logo = null)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Gets logo.
     *
     * @return ImageObject
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Sets manufacturer.
     *
     * @param Organization $manufacturer
     *
     * @return $this
     */
    public function setManufacturer(Organization $manufacturer = null)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Gets manufacturer.
     *
     * @return Organization
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Sets material.
     *
     * @param string $material
     *
     * @return $this
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Gets material.
     *
     * @return string
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Sets model.
     *
     * @param string $model
     *
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Gets model.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets mpn.
     *
     * @param string $mpn
     *
     * @return $this
     */
    public function setMpn($mpn)
    {
        $this->mpn = $mpn;

        return $this;
    }

    /**
     * Gets mpn.
     *
     * @return string
     */
    public function getMpn()
    {
        return $this->mpn;
    }

    /**
     * Sets productID.
     *
     * @param string $productID
     *
     * @return $this
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;

        return $this;
    }

    /**
     * Gets productID.
     *
     * @return string
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * Sets productionDate.
     *
     * @param \DateTime $productionDate
     *
     * @return $this
     */
    public function setProductionDate(\DateTime $productionDate = null)
    {
        $this->productionDate = $productionDate;

        return $this;
    }

    /**
     * Gets productionDate.
     *
     * @return \DateTime
     */
    public function getProductionDate()
    {
        return $this->productionDate;
    }

    /**
     * Sets purchaseDate.
     *
     * @param \DateTime $purchaseDate
     *
     * @return $this
     */
    public function setPurchaseDate(\DateTime $purchaseDate = null)
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    /**
     * Gets purchaseDate.
     *
     * @return \DateTime
     */
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    /**
     * Sets releaseDate.
     *
     * @param \DateTime $releaseDate
     *
     * @return $this
     */
    public function setReleaseDate(\DateTime $releaseDate = null)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Gets releaseDate.
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Sets weight.
     *
     * @param int $weight
     *
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Gets weight.
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Sets width.
     *
     * @param int $width
     *
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Gets width.
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Sets offers.
     *
     * @param Offer $offers
     *
     * @return $this
     */
    public function setOffers(Offer $offers = null)
    {
        $this->offers = $offers;

        return $this;
    }

    /**
     * Gets offers.
     *
     * @return Offer
     */
    public function getOffers()
    {
        return $this->offers;
    }
}
