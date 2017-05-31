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
 * The geographic shape of a place. A GeoShape can be described using several properties whose values are based on latitude/longitude pairs. Either whitespace or commas can be used to separate latitude and longitude; whitespace should be used when writing a list of several such points.
 *
 * @see http://schema.org/GeoShape Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class GeoShape extends StructuredValue
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var PostalAddress Physical address of the item
     */
    private $address;

    /**
     * @var string The country. For example, USA. You can also provide the two-letter \[ISO 3166-1 alpha-2 country code\](http://en.wikipedia.org/wiki/ISO\_3166-1)
     */
    private $addressCountry;

    /**
     * @var string A box is the area enclosed by the rectangle formed by two points. The first point is the lower corner, the second point is the upper corner. A box is expressed as two points separated by a space character
     */
    private $box;

    /**
     * @var string A circle is the circular region of a specified radius centered at a specified latitude and longitude. A circle is expressed as a pair followed by a radius in meters
     */
    private $circle;

    /**
     * @var string A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation
     */
    private $disambiguatingDescription;

    /**
     * @var float The elevation of a location (\[WGS 84\](https://en.wikipedia.org/wiki/World\_Geodetic\_System))
     */
    private $elevation;

    /**
     * @var string A line is a point-to-point path consisting of two or more points. A line is expressed as a series of two or more point objects separated by space
     */
    private $line;

    /**
     * @var string A polygon is the area enclosed by a point-to-point path for which the starting and ending points are the same. A polygon is expressed as a series of four or more space delimited points where the first and final points are identical
     */
    private $polygon;

    /**
     * @var string The postal code. For example, 94043
     */
    private $postalCode;

    /**
     * @var string The identifier property represents any kind of identifier for any kind of \[\[Thing\]\], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See \[background notes\](/docs/datamodel.html#identifierBg) for more details
     */
    private $identifier;

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
     * Sets address.
     *
     * @param PostalAddress $address
     *
     * @return $this
     */
    public function setAddress(PostalAddress $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Gets address.
     *
     * @return PostalAddress
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets addressCountry.
     *
     * @param string $addressCountry
     *
     * @return $this
     */
    public function setAddressCountry($addressCountry)
    {
        $this->addressCountry = $addressCountry;

        return $this;
    }

    /**
     * Gets addressCountry.
     *
     * @return string
     */
    public function getAddressCountry()
    {
        return $this->addressCountry;
    }

    /**
     * Sets box.
     *
     * @param string $box
     *
     * @return $this
     */
    public function setBox($box)
    {
        $this->box = $box;

        return $this;
    }

    /**
     * Gets box.
     *
     * @return string
     */
    public function getBox()
    {
        return $this->box;
    }

    /**
     * Sets circle.
     *
     * @param string $circle
     *
     * @return $this
     */
    public function setCircle($circle)
    {
        $this->circle = $circle;

        return $this;
    }

    /**
     * Gets circle.
     *
     * @return string
     */
    public function getCircle()
    {
        return $this->circle;
    }

    /**
     * Sets disambiguatingDescription.
     *
     * @param string $disambiguatingDescription
     *
     * @return $this
     */
    public function setDisambiguatingDescription($disambiguatingDescription)
    {
        $this->disambiguatingDescription = $disambiguatingDescription;

        return $this;
    }

    /**
     * Gets disambiguatingDescription.
     *
     * @return string
     */
    public function getDisambiguatingDescription()
    {
        return $this->disambiguatingDescription;
    }

    /**
     * Sets elevation.
     *
     * @param float $elevation
     *
     * @return $this
     */
    public function setElevation($elevation)
    {
        $this->elevation = $elevation;

        return $this;
    }

    /**
     * Gets elevation.
     *
     * @return float
     */
    public function getElevation()
    {
        return $this->elevation;
    }

    /**
     * Sets line.
     *
     * @param string $line
     *
     * @return $this
     */
    public function setLine($line)
    {
        $this->line = $line;

        return $this;
    }

    /**
     * Gets line.
     *
     * @return string
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Sets polygon.
     *
     * @param string $polygon
     *
     * @return $this
     */
    public function setPolygon($polygon)
    {
        $this->polygon = $polygon;

        return $this;
    }

    /**
     * Gets polygon.
     *
     * @return string
     */
    public function getPolygon()
    {
        return $this->polygon;
    }

    /**
     * Sets postalCode.
     *
     * @param string $postalCode
     *
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Gets postalCode.
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Sets identifier.
     *
     * @param string $identifier
     *
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Gets identifier.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }
}
