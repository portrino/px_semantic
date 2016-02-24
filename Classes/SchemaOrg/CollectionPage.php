<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Web page type: Collection page.
 *
 * @see http://schema.org/CollectionPage Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class CollectionPage extends WebPage {

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
