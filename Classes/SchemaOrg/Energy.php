<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Properties that take Energy as values are of the form '<Number> <Energy unit of measure>'.
 *
 * @see http://schema.org/Energy Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Energy extends Quantity {

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
