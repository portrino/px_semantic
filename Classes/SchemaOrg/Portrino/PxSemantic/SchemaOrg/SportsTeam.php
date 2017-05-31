<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Andre Wuttig <wuttig@portrino.de>, portrino GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Organization: Sports team.
 *
 * @see http://schema.org/SportsTeam Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class SportsTeam extends SportsOrganization
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Person A person that acts as performing member of a sports team; a player as opposed to a coach
     */
    private $athlete;

    /**
     * @var Person A person that acts in a coaching role for a sports team
     */
    private $coach;

    /**
     * Sets id.
     *
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets athlete.
     *
     * @param Person $athlete
     *
     * @return $this
     */
    public function setAthlete(Person $athlete = null)
    {
        $this->athlete = $athlete;

        return $this;
    }

    /**
     * Gets athlete.
     *
     * @return Person
     */
    public function getAthlete()
    {
        return $this->athlete;
    }

    /**
     * Sets coach.
     *
     * @param Person $coach
     *
     * @return $this
     */
    public function setCoach(Person $coach = null)
    {
        $this->coach = $coach;

        return $this;
    }

    /**
     * Gets coach.
     *
     * @return Person
     */
    public function getCoach()
    {
        return $this->coach;
    }
}
