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
 * A geographical region, typically under the jurisdiction of a particular government.
 *
 * @see http://schema.org/AdministrativeArea Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class AdministrativeArea extends Place
{
    /**
     * @var Place The basic containment relation between a place and one that contains it
     */
    private $containedInPlace;

    /**
     * @var Place The basic containment relation between a place and another that it contains
     */
    private $containsPlace;

    /**
     * @var Place The basic containment relation between a place and one that contains it
     */
    private $containedIn;

    /**
     * @var string A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation
     */
    private $disambiguatingDescription;

    /**
     * @var Event Upcoming or past event associated with this place, organization, or action
     */
    private $event;

    /**
     * @var Event Upcoming or past events associated with this place or organization
     */
    private $events;

    /**
     * @var string The fax number
     */
    private $faxNumber;

    /**
     * @var GeoCoordinates The geo coordinates of the place
     */
    private $geo;

    /**
     * @var string The International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place
     */
    private $isicV4;

    /**
     * @var ImageObject An associated logo
     */
    private $logo;

    /**
     * @var string A URL to a map of the place
     */
    private $hasMap;

    /**
     * @var string A URL to a map of the place
     */
    private $map;

    /**
     * @var string A URL to a map of the place
     */
    private $maps;

    /**
     * @var int The total number of individuals that may attend an event or venue
     */
    private $maximumAttendeeCapacity;

    /**
     * @var OpeningHoursSpecification The opening hours of a certain place
     */
    private $openingHoursSpecification;

    /**
     * @var OpeningHoursSpecification The special opening hours of a certain place.\\n\\nUse this to explicitly override general opening hours brought in scope by \[\[openingHoursSpecification\]\] or \[\[openingHours\]\]
     */
    private $specialOpeningHoursSpecification;

    /**
     * @var ImageObject A photograph of this place
     */
    private $photo;

    /**
     * @var ImageObject Photographs of this place
     */
    private $photos;

    /**
     * @var Review A review of the item
     */
    private $review;

    /**
     * @var Review Review of the item
     */
    private $reviews;

    /**
     * @var string The telephone number
     */
    private $telephone;

    /**
     * @var PropertyValue A property-value pair representing an additional characteristics of the entitity, e.g. a product feature or another characteristic for which there is no matching property in schema.org.\\n\\nNote: Publishers should be aware that applications designed to use specific schema.org properties (e.g. http://schema.org/width, http://schema.org/color, http://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism
     */
    private $additionalProperty;

    /**
     * @var LocationFeatureSpecification An amenity feature (e.g. a characteristic or service) of the Accommodation. This generic property does not make a statement about whether the feature is included in an offer for the main accommodation or available at extra costs
     */
    private $amenityFeature;

    /**
     * @var bool Indicates whether it is allowed to smoke in the place, e.g. in the restaurant, hotel or hotel room
     */
    private $smokingAllowed;

    /**
     * @var string The identifier property represents any kind of identifier for any kind of \[\[Thing\]\], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See \[background notes\](/docs/datamodel.html#identifierBg) for more details
     */
    private $identifier;

    /**
     * Sets containedInPlace.
     *
     * @param Place $containedInPlace
     *
     * @return $this
     */
    public function setContainedInPlace(Place $containedInPlace = null)
    {
        $this->containedInPlace = $containedInPlace;

        return $this;
    }

    /**
     * Gets containedInPlace.
     *
     * @return Place
     */
    public function getContainedInPlace()
    {
        return $this->containedInPlace;
    }

    /**
     * Sets containsPlace.
     *
     * @param Place $containsPlace
     *
     * @return $this
     */
    public function setContainsPlace(Place $containsPlace = null)
    {
        $this->containsPlace = $containsPlace;

        return $this;
    }

    /**
     * Gets containsPlace.
     *
     * @return Place
     */
    public function getContainsPlace()
    {
        return $this->containsPlace;
    }

    /**
     * Sets containedIn.
     *
     * @param Place $containedIn
     *
     * @return $this
     */
    public function setContainedIn(Place $containedIn = null)
    {
        $this->containedIn = $containedIn;

        return $this;
    }

    /**
     * Gets containedIn.
     *
     * @return Place
     */
    public function getContainedIn()
    {
        return $this->containedIn;
    }

    /**
     * Sets disambiguatingDescription.
     *
     * @param string $disambiguatingDescription
     *
     * @return $this
     */
    public function setDisambiguatingDescription($disambiguatingDescription)
    {
        $this->disambiguatingDescription = $disambiguatingDescription;

        return $this;
    }

    /**
     * Gets disambiguatingDescription.
     *
     * @return string
     */
    public function getDisambiguatingDescription()
    {
        return $this->disambiguatingDescription;
    }

    /**
     * Sets event.
     *
     * @param Event $event
     *
     * @return $this
     */
    public function setEvent(Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Gets event.
     *
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Sets events.
     *
     * @param Event $events
     *
     * @return $this
     */
    public function setEvents(Event $events = null)
    {
        $this->events = $events;

        return $this;
    }

    /**
     * Gets events.
     *
     * @return Event
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Sets faxNumber.
     *
     * @param string $faxNumber
     *
     * @return $this
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;

        return $this;
    }

    /**
     * Gets faxNumber.
     *
     * @return string
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * Sets geo.
     *
     * @param GeoCoordinates $geo
     *
     * @return $this
     */
    public function setGeo(GeoCoordinates $geo = null)
    {
        $this->geo = $geo;

        return $this;
    }

    /**
     * Gets geo.
     *
     * @return GeoCoordinates
     */
    public function getGeo()
    {
        return $this->geo;
    }

    /**
     * Sets isicV4.
     *
     * @param string $isicV4
     *
     * @return $this
     */
    public function setIsicV4($isicV4)
    {
        $this->isicV4 = $isicV4;

        return $this;
    }

    /**
     * Gets isicV4.
     *
     * @return string
     */
    public function getIsicV4()
    {
        return $this->isicV4;
    }

    /**
     * Sets logo.
     *
     * @param ImageObject $logo
     *
     * @return $this
     */
    public function setLogo(ImageObject $logo = null)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Gets logo.
     *
     * @return ImageObject
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Sets hasMap.
     *
     * @param string $hasMap
     *
     * @return $this
     */
    public function setHasMap($hasMap)
    {
        $this->hasMap = $hasMap;

        return $this;
    }

    /**
     * Gets hasMap.
     *
     * @return string
     */
    public function getHasMap()
    {
        return $this->hasMap;
    }

    /**
     * Sets map.
     *
     * @param string $map
     *
     * @return $this
     */
    public function setMap($map)
    {
        $this->map = $map;

        return $this;
    }

    /**
     * Gets map.
     *
     * @return string
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Sets maps.
     *
     * @param string $maps
     *
     * @return $this
     */
    public function setMaps($maps)
    {
        $this->maps = $maps;

        return $this;
    }

    /**
     * Gets maps.
     *
     * @return string
     */
    public function getMaps()
    {
        return $this->maps;
    }

    /**
     * Sets maximumAttendeeCapacity.
     *
     * @param int $maximumAttendeeCapacity
     *
     * @return $this
     */
    public function setMaximumAttendeeCapacity($maximumAttendeeCapacity)
    {
        $this->maximumAttendeeCapacity = $maximumAttendeeCapacity;

        return $this;
    }

    /**
     * Gets maximumAttendeeCapacity.
     *
     * @return int
     */
    public function getMaximumAttendeeCapacity()
    {
        return $this->maximumAttendeeCapacity;
    }

    /**
     * Sets openingHoursSpecification.
     *
     * @param OpeningHoursSpecification $openingHoursSpecification
     *
     * @return $this
     */
    public function setOpeningHoursSpecification(OpeningHoursSpecification $openingHoursSpecification = null)
    {
        $this->openingHoursSpecification = $openingHoursSpecification;

        return $this;
    }

    /**
     * Gets openingHoursSpecification.
     *
     * @return OpeningHoursSpecification
     */
    public function getOpeningHoursSpecification()
    {
        return $this->openingHoursSpecification;
    }

    /**
     * Sets specialOpeningHoursSpecification.
     *
     * @param OpeningHoursSpecification $specialOpeningHoursSpecification
     *
     * @return $this
     */
    public function setSpecialOpeningHoursSpecification(OpeningHoursSpecification $specialOpeningHoursSpecification = null)
    {
        $this->specialOpeningHoursSpecification = $specialOpeningHoursSpecification;

        return $this;
    }

    /**
     * Gets specialOpeningHoursSpecification.
     *
     * @return OpeningHoursSpecification
     */
    public function getSpecialOpeningHoursSpecification()
    {
        return $this->specialOpeningHoursSpecification;
    }

    /**
     * Sets photo.
     *
     * @param ImageObject $photo
     *
     * @return $this
     */
    public function setPhoto(ImageObject $photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Gets photo.
     *
     * @return ImageObject
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Sets photos.
     *
     * @param ImageObject $photos
     *
     * @return $this
     */
    public function setPhotos(ImageObject $photos = null)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Gets photos.
     *
     * @return ImageObject
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Sets review.
     *
     * @param Review $review
     *
     * @return $this
     */
    public function setReview(Review $review = null)
    {
        $this->review = $review;

        return $this;
    }

    /**
     * Gets review.
     *
     * @return Review
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Sets reviews.
     *
     * @param Review $reviews
     *
     * @return $this
     */
    public function setReviews(Review $reviews = null)
    {
        $this->reviews = $reviews;

        return $this;
    }

    /**
     * Gets reviews.
     *
     * @return Review
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * Sets telephone.
     *
     * @param string $telephone
     *
     * @return $this
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Gets telephone.
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Sets additionalProperty.
     *
     * @param PropertyValue $additionalProperty
     *
     * @return $this
     */
    public function setAdditionalProperty(PropertyValue $additionalProperty = null)
    {
        $this->additionalProperty = $additionalProperty;

        return $this;
    }

    /**
     * Gets additionalProperty.
     *
     * @return PropertyValue
     */
    public function getAdditionalProperty()
    {
        return $this->additionalProperty;
    }

    /**
     * Sets amenityFeature.
     *
     * @param LocationFeatureSpecification $amenityFeature
     *
     * @return $this
     */
    public function setAmenityFeature(LocationFeatureSpecification $amenityFeature = null)
    {
        $this->amenityFeature = $amenityFeature;

        return $this;
    }

    /**
     * Gets amenityFeature.
     *
     * @return LocationFeatureSpecification
     */
    public function getAmenityFeature()
    {
        return $this->amenityFeature;
    }

    /**
     * Sets smokingAllowed.
     *
     * @param bool $smokingAllowed
     *
     * @return $this
     */
    public function setSmokingAllowed($smokingAllowed)
    {
        $this->smokingAllowed = $smokingAllowed;

        return $this;
    }

    /**
     * Gets smokingAllowed.
     *
     * @return bool
     */
    public function getSmokingAllowed()
    {
        return $this->smokingAllowed;
    }

    /**
     * Sets identifier.
     *
     * @param string $identifier
     *
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Gets identifier.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }
}
