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
 * An event happening at a certain time and location, such as a concert, lecture, or festival. Ticketing information may be added via the [[offers]] property. Repeated events may be structured as separate Event objects.
 *
 * @see http://schema.org/Event Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Event extends Thing
{
    /**
     * @var Person An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip
     */
    private $actor;
    /**
     * @var AggregateRating The overall rating, based on a collection of reviews or ratings, of the item
     */
    private $aggregateRating;
    /**
     * @var Person An organizer of an Event
     */
    private $organizer;
    /**
     * @var Person A person or organization attending the event
     */
    private $attendee;
    /**
     * @var Person A secondary contributor to the CreativeWork or Event
     */
    private $contributor;
    /**
     * @var Person A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip
     */
    private $director;
    /**
     * @var \DateTime The time admission will commence
     */
    private $doorTime;
    /**
     * @var Duration The duration of the item (movie, audio recording, event, etc.) in [ISO 8601 date format](http://en.wikipedia.org/wiki/ISO\_8601)
     */
    private $duration;
    /**
     * @var \DateTime The end date and time of the item (in [ISO 8601 date format](http://en.wikipedia.org/wiki/ISO\_8601))
     */
    private $endDate;
    /**
     * @var bool A flag to signal that the publication is accessible for free
     */
    private $isAccessibleForFree;
    /**
     * @var string The language of the content or performance or used in an action. Please use one of the language codes from the [IETF BCP 47 standard](http://tools.ietf.org/html/bcp47). See also [[availableLanguage]]
     */
    private $inLanguage;
    /**
     * @var Place The location of for example where the event is happening, an organization is located, or where an action takes place
     */
    private $location;
    /**
     * @var Person A performer at the event—for example, a presenter, musician, musical group or actor
     */
    private $performer;
    /**
     * @var \DateTime Used in conjunction with eventStatus for rescheduled or cancelled events. This property contains the previously scheduled start date. For rescheduled events, the startDate property should be used for the newly scheduled start date. In the (rare) case of an event that has been postponed and rescheduled multiple times, this field may be repeated
     */
    private $previousStartDate;
    /**
     * @var CreativeWork The CreativeWork that captured all or part of this Event
     */
    private $recordedIn;
    /**
     * @var Person A person or organization that supports (sponsors) something through some kind of financial contribution
     */
    private $funder;
    /**
     * @var Person The person or organization who wrote a composition, or who is the composer of a work performed at some event
     */
    private $composer;

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
     * Sets organizer.
     *
     * @param Person $organizer
     *
     * @return $this
     */
    public function setOrganizer(Person $organizer = null)
    {
        $this->organizer = $organizer;

        return $this;
    }

    /**
     * Gets organizer.
     *
     * @return Person
     */
    public function getOrganizer()
    {
        return $this->organizer;
    }

    /**
     * Sets attendee.
     *
     * @param Person $attendee
     *
     * @return $this
     */
    public function setAttendee(Person $attendee = null)
    {
        $this->attendee = $attendee;

        return $this;
    }

    /**
     * Gets attendee.
     *
     * @return Person
     */
    public function getAttendee()
    {
        return $this->attendee;
    }

    /**
     * Sets contributor.
     *
     * @param Person $contributor
     *
     * @return $this
     */
    public function setContributor(Person $contributor = null)
    {
        $this->contributor = $contributor;

        return $this;
    }

    /**
     * Gets contributor.
     *
     * @return Person
     */
    public function getContributor()
    {
        return $this->contributor;
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
     * Sets doorTime.
     *
     * @param \DateTime $doorTime
     *
     * @return $this
     */
    public function setDoorTime($doorTime = null)
    {
        if ($doorTime instanceof \DateTime) {
            $this->doorTime = $doorTime;
        } else {
            $this->doorTime = new \DateTime($doorTime);
        }

        return $this;
    }

    /**
     * Gets doorTime.
     *
     * @return \DateTime
     */
    public function getDoorTime()
    {
        return $this->doorTime;
    }

    /**
     * Sets duration.
     *
     * @param Duration $duration
     *
     * @return $this
     */
    public function setDuration(Duration $duration = null)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Gets duration.
     *
     * @return Duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Sets endDate.
     *
     * @param \DateTime $endDate
     *
     * @return $this
     */
    public function setEndDate($endDate = null)
    {
        if ($endDate instanceof \DateTime) {
            $this->endDate = $endDate;
        } else {
            $this->endDate = new \DateTime($endDate);
        }

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
     * Sets isAccessibleForFree.
     *
     * @param bool $isAccessibleForFree
     *
     * @return $this
     */
    public function setIsAccessibleForFree($isAccessibleForFree)
    {
        $this->isAccessibleForFree = $isAccessibleForFree;

        return $this;
    }

    /**
     * Gets isAccessibleForFree.
     *
     * @return bool
     */
    public function getIsAccessibleForFree()
    {
        return $this->isAccessibleForFree;
    }

    /**
     * Sets inLanguage.
     *
     * @param string $inLanguage
     *
     * @return $this
     */
    public function setInLanguage($inLanguage)
    {
        $this->inLanguage = $inLanguage;

        return $this;
    }

    /**
     * Gets inLanguage.
     *
     * @return string
     */
    public function getInLanguage()
    {
        return $this->inLanguage;
    }

    /**
     * Sets location.
     *
     * @param Place $location
     *
     * @return $this
     */
    public function setLocation(Place $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Gets location.
     *
     * @return Place
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets performer.
     *
     * @param Person $performer
     *
     * @return $this
     */
    public function setPerformer(Person $performer = null)
    {
        $this->performer = $performer;

        return $this;
    }

    /**
     * Gets performer.
     *
     * @return Person
     */
    public function getPerformer()
    {
        return $this->performer;
    }

    /**
     * Sets previousStartDate.
     *
     * @param \DateTime $previousStartDate
     *
     * @return $this
     */
    public function setPreviousStartDate($previousStartDate = null)
    {
        if ($previousStartDate instanceof \DateTime) {
            $this->previousStartDate = $previousStartDate;
        } else {
            $this->previousStartDate = new \DateTime($previousStartDate);
        }

        return $this;
    }

    /**
     * Gets previousStartDate.
     *
     * @return \DateTime
     */
    public function getPreviousStartDate()
    {
        return $this->previousStartDate;
    }

    /**
     * Sets recordedIn.
     *
     * @param CreativeWork $recordedIn
     *
     * @return $this
     */
    public function setRecordedIn(CreativeWork $recordedIn = null)
    {
        $this->recordedIn = $recordedIn;

        return $this;
    }

    /**
     * Gets recordedIn.
     *
     * @return CreativeWork
     */
    public function getRecordedIn()
    {
        return $this->recordedIn;
    }

    /**
     * Sets funder.
     *
     * @param Person $funder
     *
     * @return $this
     */
    public function setFunder(Person $funder = null)
    {
        $this->funder = $funder;

        return $this;
    }

    /**
     * Gets funder.
     *
     * @return Person
     */
    public function getFunder()
    {
        return $this->funder;
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
}
