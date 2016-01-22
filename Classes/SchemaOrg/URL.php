<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Data type: URL.
 *
 * @see http://schema.org/URL Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class URL extends Text {

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
