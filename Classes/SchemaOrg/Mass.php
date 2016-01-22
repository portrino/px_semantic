<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Properties that take Mass as values are of the form '<Number> <Mass unit of measure>'. E.g., '7 kg'.
 *
 * @see http://schema.org/Mass Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Mass extends Quantity {

    /**
     * @var int
     */
    private $id;

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
}
