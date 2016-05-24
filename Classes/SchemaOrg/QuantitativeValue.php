<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A point value or interval for product characteristics and other purposes.
 *
 * @see http://schema.org/QuantitativeValue Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class QuantitativeValue extends StructuredValue {

    /**
     * @var int
     */
    private $id;

    /**
     * @var float The upper value of some characteristic or property.
     */
    private $maxValue;

    /**
     * @var float The lower value of some characteristic or property.
     */
    private $minValue;

    /**
     * @var string The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon.
     */
    private $unitCode;

    /**
     * @var string The value of the quantitative value or property value node.
     *             For QuantitativeValue and MonetaryValue, the recommended type for values is 'Number'.
     *             For PropertyValue, it can be 'Text;', 'Number', 'Boolean', or 'StructuredValue'.
     */
    private $value;

    /**
     * @var string A string or text indicating the unit of measurement. Useful if you cannot provide a standard unit code for <unitCode>.
     */
    private $unitText;

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
     * Sets maxValue.
     *
     * @param float $maxValue
     *
     * @return $this
     */
    public function setMaxValue($maxValue) {
        $this->maxValue = $maxValue;

        return $this;
    }

    /**
     * Gets maxValue.
     *
     * @return float
     */
    public function getMaxValue() {
        return $this->maxValue;
    }

    /**
     * Sets minValue.
     *
     * @param float $minValue
     *
     * @return $this
     */
    public function setMinValue($minValue) {
        $this->minValue = $minValue;

        return $this;
    }

    /**
     * Gets minValue.
     *
     * @return float
     */
    public function getMinValue() {
        return $this->minValue;
    }

    /**
     * Sets unitCode.
     *
     * @param string $unitCode
     *
     * @return $this
     */
    public function setUnitCode($unitCode) {
        $this->unitCode = $unitCode;

        return $this;
    }

    /**
     * Gets unitCode.
     *
     * @return string
     */
    public function getUnitCode() {
        return $this->unitCode;
    }

    /**
     * Sets value.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value) {
        $this->value = $value;

        return $this;
    }

    /**
     * Gets value.
     *
     * @return string
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * Sets unitText.
     *
     * @param string $unitText
     *
     * @return $this
     */
    public function setUnitText($unitText) {
        $this->unitText = $unitText;

        return $this;
    }

    /**
     * Gets unitText.
     *
     * @return string
     */
    public function getUnitText() {
        return $this->unitText;
    }
}
