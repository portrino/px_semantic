<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Natural languages such as Spanish, Tamil, Hindi, English, etc. and programming languages such as Scheme and Lisp.
 *
 * @see http://schema.org/Language Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Language extends Intangible {

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
