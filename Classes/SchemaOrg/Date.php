<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A date value in [ISO 8601 date format](http://en.wikipedia.org/wiki/ISO_8601).
 *
 * @see http://schema.org/Date Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Date {

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
