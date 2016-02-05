<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A WebSite is a set of related web pages and other items typically served from a single web domain and accessible via URLs.
 *
 * @see http://schema.org/WebSite Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class WebSite extends CreativeWork {
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
