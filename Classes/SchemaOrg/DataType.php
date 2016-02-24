<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * The basic data types such as Integers, Strings, etc.
 *
 * @see http://schema.org/DataType Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class DataType extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * @var int
     */
    private
        $id;

    /**
     * Sets id.
     *
     * @param int $id
     *
     * @return $this
     */
    public
    function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public
    function getId() {
        return $this->id;
    }
}
