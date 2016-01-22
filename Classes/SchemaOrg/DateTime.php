<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A combination of date and time of day in the form [-]CCYY-MM-DDThh:mm:ss[Z|(+|-)hh:mm] (see Chapter 5.4 of ISO 8601).
 *
 * @see http://schema.org/DateTime Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class DateTime {

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
