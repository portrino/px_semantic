<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * An answer offered to a question; perhaps correct, perhaps opinionated or wrong.
 *
 * @see http://schema.org/Answer Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Answer extends Comment {

    /**
     * @var string
     */
    private $id;

    /**
     * Sets id.
     *
     * @param string $id
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
     * @return string
     */
    public function getId() {
        return $this->id;
    }
}
