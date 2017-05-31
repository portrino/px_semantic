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
 * An event happening at a certain time and location, such as a concert, lecture, or festival. Ticketing information may be added via the \[\[offers\]\] property. Repeated events may be structured as separate Event objects.
 *
 * @see http://schema.org/Event Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Event extends Thing
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Thing The subject matter of the content
     */
    private $about;

    /**
     * @var Person An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip
     */
    private $actor;

    /**
     * @var AggregateRating The overall rating, based on a collection of reviews or ratings, of the item
     */
    private $aggregateRating;

    /**
     * @var Organization A person or organization attending the event
     */
    private $attendee;

    /**
     * @var \DateTime The start date and time of the item (in \[ISO 8601 date format\](http://en.wikipedia.org/wiki/ISO\_8601))
     */
    private $startDate;

    /**
     * @var \DateTime The end date and time of the item (in \[ISO 8601 date format\](http://en.wikipedia.org/wiki/ISO\_8601))
     */
    private $endDate;

    /**
     * @var Person The person or organization who wrote a composition, or who is the composer of a work performed at some event
     */
    private $composer;

    /**
     * @var Person A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip
     */
    private $director;

    /**
     * @var Organization A secondary contributor to the CreativeWork or Event
     */
    private $contributor;

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
     * Sets about.
     *
     * @param Thing $about
     *
     * @return $this
     */
    public function setAbout(Thing $about = null)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Gets about.
     *
     * @return Thing
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Sets actor.
     *
     * @param Person $actor
     *
     * @return $this
     */
    public function setActor(Person $actor = null)
    {
        $this->actor = $actor;

        return $this;
    }

    /**
     * Gets actor.
     *
     * @return Person
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Sets aggregateRating.
     *
     * @param AggregateRating $aggregateRating
     *
     * @return $this
     */
    public function setAggregateRating(AggregateRating $aggregateRating = null)
    {
        $this->aggregateRating = $aggregateRating;

        return $this;
    }

    /**
     * Gets aggregateRating.
     *
     * @return AggregateRating
     */
    public function getAggregateRating()
    {
        return $this->aggregateRating;
    }

    /**
     * Sets attendee.
     *
     * @param Organization $attendee
     *
     * @return $this
     */
    public function setAttendee(Organization $attendee = null)
    {
        $this->attendee = $attendee;

        return $this;
    }

    /**
     * Gets attendee.
     *
     * @return Organization
     */
    public function getAttendee()
    {
        return $this->attendee;
    }

    /**
     * Sets startDate.
     *
     * @param \DateTime $startDate
     *
     * @return $this
     */
    public function setStartDate(\DateTime $startDate = null)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Gets startDate.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets endDate.
     *
     * @param \DateTime $endDate
     *
     * @return $this
     */
    public function setEndDate(\DateTime $endDate = null)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Gets endDate.
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Sets composer.
     *
     * @param Person $composer
     *
     * @return $this
     */
    public function setComposer(Person $composer = null)
    {
        $this->composer = $composer;

        return $this;
    }

    /**
     * Gets composer.
     *
     * @return Person
     */
    public function getComposer()
    {
        return $this->composer;
    }

    /**
     * Sets director.
     *
     * @param Person $director
     *
     * @return $this
     */
    public function setDirector(Person $director = null)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Gets director.
     *
     * @return Person
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Sets contributor.
     *
     * @param Organization $contributor
     *
     * @return $this
     */
    public function setContributor(Organization $contributor = null)
    {
        $this->contributor = $contributor;

        return $this;
    }

    /**
     * Gets contributor.
     *
     * @return Organization
     */
    public function getContributor()
    {
        return $this->contributor;
    }
}
