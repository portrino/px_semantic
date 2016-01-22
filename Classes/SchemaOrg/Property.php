<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A property, used to indicate attributes and relationships of some Thing; equivalent to rdf:Property.
 *
 * @see http://schema.org/Property Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Property extends Intangible {

    /**
     * @var int
     */
    private $id;

    /**
     * @var SchemaOrgClass Relates a property to a class that is (one of) the type(s) the property is expected to be used on.
     */
    protected $domainIncludes;

    /**
     * @var Property Relates a property to a property that is its inverse. Inverse properties relate the same pairs of items to each other, but in reversed direction. For example, the 'alumni' and 'alumniOf' properties are inverseOf each other. Some properties don't have explicit inverses; in these situations RDFa and JSON-LD syntax for reverse properties can be used.
     */
    protected $inverseOf;

    /**
     * @var SchemaOrgClass Relates a term (i.e. a property, class or enumeration) to one that supersedes it.
     */
    protected $supersededBy;

    /**
     * @var SchemaOrgClass Relates a property to a class that constitutes (one of) the expected type(s) for values of the property.
     */
    protected $rangeIncludes;

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
     * Sets domainIncludes.
     *
     * @param SchemaOrgClass $domainIncludes
     *
     * @return $this
     */
    public function setDomainIncludes(SchemaOrgClass $domainIncludes = NULL) {
        $this->domainIncludes = $domainIncludes;

        return $this;
    }

    /**
     * Gets domainIncludes.
     *
     * @return SchemaOrgClass
     */
    public
    function getDomainIncludes() {
        return $this->domainIncludes;
    }

    /**
     * Sets inverseOf.
     *
     * @param Property $inverseOf
     *
     * @return $this
     */
    public
    function setInverseOf(Property $inverseOf = NULL) {
        $this->inverseOf = $inverseOf;

        return $this;
    }

    /**
     * Gets inverseOf.
     *
     * @return Property
     */
    public
    function getInverseOf() {
        return $this->inverseOf;
    }

    /**
     * Sets supersededBy.
     *
     * @param SchemaOrgClass $supersededBy
     *
     * @return $this
     */
    public
    function setSupersededBy(SchemaOrgClass $supersededBy = NULL) {
        $this->supersededBy = $supersededBy;

        return $this;
    }

    /**
     * Gets supersededBy.
     *
     * @return SchemaOrgClass
     */
    public function getSupersededBy() {
        return $this->supersededBy;
    }

    /**
     * Sets rangeIncludes.
     *
     * @param SchemaOrgClass $rangeIncludes
     *
     * @return $this
     */
    public function setRangeIncludes(SchemaOrgClass $rangeIncludes = NULL) {
        $this->rangeIncludes = $rangeIncludes;

        return $this;
    }

    /**
     * Gets rangeIncludes.
     *
     * @return SchemaOrgClass
     */
    public function getRangeIncludes() {
        return $this->rangeIncludes;
    }
}
