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
 * A property-value pair, e.g. representing a feature of a product or place. Use the 'name' property for the name of the property. If there is an additional human-readable version of the value, put that into the 'description' property.\\n\\n Always use specific schema.org properties when a) they exist and b) you can populate them. Using PropertyValue as a substitute will typically not trigger the same effect as using the original, specific property.
 *
 * @see http://schema.org/PropertyValue Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
abstract class PropertyValue extends StructuredValue
{
    /**
     * @var string A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation
     */
    private $disambiguatingDescription;

    /**
     * @var float The upper value of some characteristic or property
     */
    private $maxValue;

    /**
     * @var float The lower value of some characteristic or property
     */
    private $minValue;

    /**
     * @var string The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon
     */
    private $unitCode;

    /**
     * @var float The value of the quantitative value or property value node.\\n\\n\* For \[\[QuantitativeValue\]\] and \[\[MonetaryAmount\]\], the recommended type for values is 'Number'.\\n\* For \[\[PropertyValue\]\], it can be 'Text;', 'Number', 'Boolean', or 'StructuredValue'
     */
    private $value;

    /**
     * @var StructuredValue A pointer to a secondary value that provides additional information on the original value, e.g. a reference temperature
     */
    private $valueReference;

    /**
     * @var string A string or text indicating the unit of measurement. Useful if you cannot provide a standard unit code for [unitCode](unitCode)
     */
    private $unitText;

    /**
     * @var string A commonly used identifier for the characteristic represented by the property, e.g. a manufacturer or a standard code for a property. propertyID can be (1) a prefixed string, mainly meant to be used with standards for product properties; (2) a site-specific, non-prefixed string (e.g. the primary key of the property or the vendor-specific id of the property), or (3) a URL indicating the type of the property, either pointing to an external vocabulary, or a Web resource that describes the property (e.g. a glossary entry). Standards bodies should promote a standard prefix for the identifiers of properties from their standards
     */
    private $propertyID;

    /**
     * @var string The identifier property represents any kind of identifier for any kind of \[\[Thing\]\], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See \[background notes\](/docs/datamodel.html#identifierBg) for more details
     */
    private $identifier;

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
     * Sets maxValue.
     *
     * @param float $maxValue
     *
     * @return $this
     */
    public function setMaxValue($maxValue)
    {
        $this->maxValue = $maxValue;

        return $this;
    }

    /**
     * Gets maxValue.
     *
     * @return float
     */
    public function getMaxValue()
    {
        return $this->maxValue;
    }

    /**
     * Sets minValue.
     *
     * @param float $minValue
     *
     * @return $this
     */
    public function setMinValue($minValue)
    {
        $this->minValue = $minValue;

        return $this;
    }

    /**
     * Gets minValue.
     *
     * @return float
     */
    public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * Sets unitCode.
     *
     * @param string $unitCode
     *
     * @return $this
     */
    public function setUnitCode($unitCode)
    {
        $this->unitCode = $unitCode;

        return $this;
    }

    /**
     * Gets unitCode.
     *
     * @return string
     */
    public function getUnitCode()
    {
        return $this->unitCode;
    }

    /**
     * Sets value.
     *
     * @param float $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Gets value.
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets valueReference.
     *
     * @param StructuredValue $valueReference
     *
     * @return $this
     */
    public function setValueReference(StructuredValue $valueReference = null)
    {
        $this->valueReference = $valueReference;

        return $this;
    }

    /**
     * Gets valueReference.
     *
     * @return StructuredValue
     */
    public function getValueReference()
    {
        return $this->valueReference;
    }

    /**
     * Sets unitText.
     *
     * @param string $unitText
     *
     * @return $this
     */
    public function setUnitText($unitText)
    {
        $this->unitText = $unitText;

        return $this;
    }

    /**
     * Gets unitText.
     *
     * @return string
     */
    public function getUnitText()
    {
        return $this->unitText;
    }

    /**
     * Sets propertyID.
     *
     * @param string $propertyID
     *
     * @return $this
     */
    public function setPropertyID($propertyID)
    {
        $this->propertyID = $propertyID;

        return $this;
    }

    /**
     * Gets propertyID.
     *
     * @return string
     */
    public function getPropertyID()
    {
        return $this->propertyID;
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
