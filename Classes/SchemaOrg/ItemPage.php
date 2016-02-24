<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A page devoted to a single item, such as a particular product or hotel.
 *
 * @see http://schema.org/ItemPage Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class ItemPage extends WebPage {

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
