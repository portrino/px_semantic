<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Data type: Integer.
 *
 * @see http://schema.org/Integer Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Integer extends Number {

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
