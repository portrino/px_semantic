<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Organization: Sports team.
 *
 * @see http://schema.org/SportsTeam Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class SportsTeam extends SportsOrganization {

    /**
     * @var int
     */
    private $id;

    /**
     * @var Person A person that acts in a coaching role for a sports team.
     */
    private $coach;

    /**
     * @var Person A person that acts as performing member of a sports team; a player as opposed to a coach.
     */
    private $athlete;

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

    /**
     * Sets coach.
     *
     * @param Person $coach
     *
     * @return $this
     */
    public function setCoach(Person $coach = NULL) {
        $this->coach = $coach;

        return $this;
    }

    /**
     * Gets coach.
     *
     * @return Person
     */
    public function getCoach() {
        return $this->coach;
    }

    /**
     * Sets athlete.
     *
     * @param Person $athlete
     *
     * @return $this
     */
    public function setAthlete(Person $athlete = NULL) {
        $this->athlete = $athlete;

        return $this;
    }

    /**
     * Gets athlete.
     *
     * @return Person
     */
    public function getAthlete() {
        return $this->athlete;
    }
}
