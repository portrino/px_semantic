<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A person (alive, dead, undead, or fictional).
 *
 * @see http://schema.org/Person Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Person extends Thing {

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
