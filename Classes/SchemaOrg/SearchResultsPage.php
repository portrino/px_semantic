<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Web page type: Search results page.
 *
 * @see http://schema.org/SearchResultsPage Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class SearchResultsPage extends WebPage {

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
