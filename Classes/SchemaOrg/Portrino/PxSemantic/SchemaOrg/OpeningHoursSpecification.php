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
 * A structured value providing information about the opening hours of a place or a certain service inside a place.\\n\\n The place is \_\_open\_\_ if the \[\[opens\]\] property is specified, and \_\_closed\_\_ otherwise.\\n\\nIf the value for the \[\[closes\]\] property is less than the value for the \[\[opens\]\] property then the hour range is assumed to span over the next day.
 *
 * @see http://schema.org/OpeningHoursSpecification Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class OpeningHoursSpecification extends StructuredValue
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime The closing hour of the place or service on the given day(s) of the week
     */
    private $closes;

    /**
     * @var \DateTime The opening hour of the place or service on the given day(s) of the week
     */
    private $opens;

    /**
     * @var \DateTime The date when the item becomes valid
     */
    private $validFrom;

    /**
     * @var \DateTime The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours
     */
    private $validThrough;

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
     * Sets closes.
     *
     * @param \DateTime $closes
     *
     * @return $this
     */
    public function setCloses(\DateTime $closes)
    {
        $this->closes = $closes;

        return $this;
    }

    /**
     * Gets closes.
     *
     * @return \DateTime
     */
    public function getCloses()
    {
        return $this->closes;
    }

    /**
     * Sets opens.
     *
     * @param \DateTime $opens
     *
     * @return $this
     */
    public function setOpens(\DateTime $opens)
    {
        $this->opens = $opens;

        return $this;
    }

    /**
     * Gets opens.
     *
     * @return \DateTime
     */
    public function getOpens()
    {
        return $this->opens;
    }

    /**
     * Sets validFrom.
     *
     * @param \DateTime $validFrom
     *
     * @return $this
     */
    public function setValidFrom(\DateTime $validFrom = null)
    {
        $this->validFrom = $validFrom;

        return $this;
    }

    /**
     * Gets validFrom.
     *
     * @return \DateTime
     */
    public function getValidFrom()
    {
        return $this->validFrom;
    }

    /**
     * Sets validThrough.
     *
     * @param \DateTime $validThrough
     *
     * @return $this
     */
    public function setValidThrough(\DateTime $validThrough = null)
    {
        $this->validThrough = $validThrough;

        return $this;
    }

    /**
     * Gets validThrough.
     *
     * @return \DateTime
     */
    public function getValidThrough()
    {
        return $this->validThrough;
    }
}
