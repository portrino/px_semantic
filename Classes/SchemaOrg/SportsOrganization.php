<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Represents the collection of all sports organizations, including sports teams, governing bodies, and sports associations.
 *
 * @see http://schema.org/SportsOrganization Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class SportsOrganization extends Organization {

    /**
     * @var string A type of sport (e.g. Baseball).
     */
    private $sport;

    /**
     * Sets sport.
     *
     * @param string $sport
     *
     * @return $this
     */
    public function setSport($sport) {
        $this->sport = $sport;

        return $this;
    }

    /**
     * Gets sport.
     *
     * @return string
     */
    public function getSport() {
        return $this->sport;
    }
}
