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
 * An organization such as a school, NGO, corporation, club, etc.
 *
 * @see http://schema.org/Organization Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Organization extends Thing
{
    /**
     * @var PostalAddress Physical address of the item
     */
    private $address;

    /**
     * @var AggregateRating The overall rating, based on a collection of reviews or ratings, of the item
     */
    private $aggregateRating;

    /**
     * @var Person Alumni of an organization
     */
    private $alumni;

    /**
     * @var string The geographic area where a service or offered item is provided
     */
    private $areaServed;

    /**
     * @var string An award won by or for this item
     */
    private $award;

    /**
     * @var Organization The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person
     */
    private $brand;

    /**
     * @var ContactPoint A contact point for a person or organization
     */
    private $contactPoint;

    /**
     * @var ContactPoint A contact point for a person or organization
     */
    private $contactPoints;

    /**
     * @var Organization A relationship between an organization and a department of that organization, also described as an organization (allowing different urls, logos, opening hours). For example: a store with a pharmacy, or a bakery with a cafe
     */
    private $department;

    /**
     * @var \DateTime The date that this organization was dissolved
     */
    private $dissolutionDate;

    /**
     * @var string The Dun & Bradstreet DUNS number for identifying an organization or business person
     */
    private $duns;

    /**
     * @var string Email address
     */
    private $email;

    /**
     * @var Person Someone working for this organization
     */
    private $employee;

    /**
     * @var string The fax number
     */
    private $faxNumber;

    /**
     * @var Person A person who founded this organization
     */
    private $founder;

    /**
     * @var \DateTime The date that this organization was founded
     */
    private $foundingDate;

    /**
     * @var Place The place where the Organization was founded
     */
    private $foundingLocation;

    /**
     * @var string The \[Global Location Number\](http://www.gs1.org/gln) (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations
     */
    private $globalLocationNumber;

    /**
     * @var Place Points-of-Sales operated by the organization or person
     */
    private $hasPOS;

    /**
     * @var string The International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place
     */
    private $isicV4;

    /**
     * @var string The official name of the organization, e.g. the registered company name
     */
    private $legalName;

    /**
     * @var Place The location of for example where the event is happening, an organization is located, or where an action takes place
     */
    private $location;

    /**
     * @var ImageObject An associated logo
     */
    private $logo;

    /**
     * @var Organization A member of an Organization or a ProgramMembership. Organizations can be members of organizations; ProgramMembership is typically for individuals
     */
    private $member;

    /**
     * @var Organization An Organization (or ProgramMembership) to which this Person or Organization belongs
     */
    private $memberOf;

    /**
     * @var string The North American Industry Classification System (NAICS) code for a particular organization or business person
     */
    private $naics;

    /**
     * @var QuantitativeValue The number of employees in an organization e.g. business
     */
    private $numberOfEmployees;

    /**
     * @var Organization The larger organization that this organization is a \[\[subOrganization\]\] of, if any
     */
    private $parentOrganization;

    /**
     * @var Review A review of the item
     */
    private $review;

    /**
     * @var Organization A relationship between two organizations where the first includes the second, e.g., as a subsidiary. See also: the more specific 'department' property
     */
    private $subOrganization;

    /**
     * @var string The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US or the CIF/NIF in Spain
     */
    private $taxID;

    /**
     * @var string The telephone number
     */
    private $telephone;

    /**
     * @var string The Value-added Tax ID of the organization or person
     */
    private $vatID;

    /**
     * Sets address.
     *
     * @param PostalAddress $address
     *
     * @return $this
     */
    public function setAddress(PostalAddress $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Gets address.
     *
     * @return PostalAddress
     */
    public function getAddress()
    {
        return $this->address;
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
     * Sets alumni.
     *
     * @param Person $alumni
     *
     * @return $this
     */
    public function setAlumni(Person $alumni = null)
    {
        $this->alumni = $alumni;

        return $this;
    }

    /**
     * Gets alumni.
     *
     * @return Person
     */
    public function getAlumni()
    {
        return $this->alumni;
    }

    /**
     * Sets areaServed.
     *
     * @param string $areaServed
     *
     * @return $this
     */
    public function setAreaServed($areaServed)
    {
        $this->areaServed = $areaServed;

        return $this;
    }

    /**
     * Gets areaServed.
     *
     * @return string
     */
    public function getAreaServed()
    {
        return $this->areaServed;
    }

    /**
     * Sets award.
     *
     * @param string $award
     *
     * @return $this
     */
    public function setAward($award)
    {
        $this->award = $award;

        return $this;
    }

    /**
     * Gets award.
     *
     * @return string
     */
    public function getAward()
    {
        return $this->award;
    }

    /**
     * Sets brand.
     *
     * @param Organization $brand
     *
     * @return $this
     */
    public function setBrand(Organization $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Gets brand.
     *
     * @return Organization
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Sets contactPoint.
     *
     * @param ContactPoint $contactPoint
     *
     * @return $this
     */
    public function setContactPoint(ContactPoint $contactPoint = null)
    {
        $this->contactPoint = $contactPoint;

        return $this;
    }

    /**
     * Gets contactPoint.
     *
     * @return ContactPoint
     */
    public function getContactPoint()
    {
        return $this->contactPoint;
    }

    /**
     * Sets contactPoints.
     *
     * @param ContactPoint $contactPoints
     *
     * @return $this
     */
    public function setContactPoints(ContactPoint $contactPoints = null)
    {
        $this->contactPoints = $contactPoints;

        return $this;
    }

    /**
     * Gets contactPoints.
     *
     * @return ContactPoint
     */
    public function getContactPoints()
    {
        return $this->contactPoints;
    }

    /**
     * Sets department.
     *
     * @param Organization $department
     *
     * @return $this
     */
    public function setDepartment(Organization $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Gets department.
     *
     * @return Organization
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Sets dissolutionDate.
     *
     * @param \DateTime $dissolutionDate
     *
     * @return $this
     */
    public function setDissolutionDate(\DateTime $dissolutionDate = null)
    {
        $this->dissolutionDate = $dissolutionDate;

        return $this;
    }

    /**
     * Gets dissolutionDate.
     *
     * @return \DateTime
     */
    public function getDissolutionDate()
    {
        return $this->dissolutionDate;
    }

    /**
     * Sets duns.
     *
     * @param string $duns
     *
     * @return $this
     */
    public function setDuns($duns)
    {
        $this->duns = $duns;

        return $this;
    }

    /**
     * Gets duns.
     *
     * @return string
     */
    public function getDuns()
    {
        return $this->duns;
    }

    /**
     * Sets email.
     *
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets employee.
     *
     * @param Person $employee
     *
     * @return $this
     */
    public function setEmployee(Person $employee = null)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Gets employee.
     *
     * @return Person
     */
    public function getEmployee()
    {
        return $this->employee;
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
     * Sets founder.
     *
     * @param Person $founder
     *
     * @return $this
     */
    public function setFounder(Person $founder = null)
    {
        $this->founder = $founder;

        return $this;
    }

    /**
     * Gets founder.
     *
     * @return Person
     */
    public function getFounder()
    {
        return $this->founder;
    }

    /**
     * Sets foundingDate.
     *
     * @param \DateTime $foundingDate
     *
     * @return $this
     */
    public function setFoundingDate(\DateTime $foundingDate = null)
    {
        $this->foundingDate = $foundingDate;

        return $this;
    }

    /**
     * Gets foundingDate.
     *
     * @return \DateTime
     */
    public function getFoundingDate()
    {
        return $this->foundingDate;
    }

    /**
     * Sets foundingLocation.
     *
     * @param Place $foundingLocation
     *
     * @return $this
     */
    public function setFoundingLocation(Place $foundingLocation = null)
    {
        $this->foundingLocation = $foundingLocation;

        return $this;
    }

    /**
     * Gets foundingLocation.
     *
     * @return Place
     */
    public function getFoundingLocation()
    {
        return $this->foundingLocation;
    }

    /**
     * Sets globalLocationNumber.
     *
     * @param string $globalLocationNumber
     *
     * @return $this
     */
    public function setGlobalLocationNumber($globalLocationNumber)
    {
        $this->globalLocationNumber = $globalLocationNumber;

        return $this;
    }

    /**
     * Gets globalLocationNumber.
     *
     * @return string
     */
    public function getGlobalLocationNumber()
    {
        return $this->globalLocationNumber;
    }

    /**
     * Sets hasPOS.
     *
     * @param Place $hasPOS
     *
     * @return $this
     */
    public function setHasPOS(Place $hasPOS = null)
    {
        $this->hasPOS = $hasPOS;

        return $this;
    }

    /**
     * Gets hasPOS.
     *
     * @return Place
     */
    public function getHasPOS()
    {
        return $this->hasPOS;
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
     * Sets legalName.
     *
     * @param string $legalName
     *
     * @return $this
     */
    public function setLegalName($legalName)
    {
        $this->legalName = $legalName;

        return $this;
    }

    /**
     * Gets legalName.
     *
     * @return string
     */
    public function getLegalName()
    {
        return $this->legalName;
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
     * Sets member.
     *
     * @param Organization $member
     *
     * @return $this
     */
    public function setMember(Organization $member = null)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Gets member.
     *
     * @return Organization
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Sets memberOf.
     *
     * @param Organization $memberOf
     *
     * @return $this
     */
    public function setMemberOf(Organization $memberOf = null)
    {
        $this->memberOf = $memberOf;

        return $this;
    }

    /**
     * Gets memberOf.
     *
     * @return Organization
     */
    public function getMemberOf()
    {
        return $this->memberOf;
    }

    /**
     * Sets naics.
     *
     * @param string $naics
     *
     * @return $this
     */
    public function setNaics($naics)
    {
        $this->naics = $naics;

        return $this;
    }

    /**
     * Gets naics.
     *
     * @return string
     */
    public function getNaics()
    {
        return $this->naics;
    }

    /**
     * Sets numberOfEmployees.
     *
     * @param QuantitativeValue $numberOfEmployees
     *
     * @return $this
     */
    public function setNumberOfEmployees(QuantitativeValue $numberOfEmployees = null)
    {
        $this->numberOfEmployees = $numberOfEmployees;

        return $this;
    }

    /**
     * Gets numberOfEmployees.
     *
     * @return QuantitativeValue
     */
    public function getNumberOfEmployees()
    {
        return $this->numberOfEmployees;
    }

    /**
     * Sets parentOrganization.
     *
     * @param Organization $parentOrganization
     *
     * @return $this
     */
    public function setParentOrganization(Organization $parentOrganization = null)
    {
        $this->parentOrganization = $parentOrganization;

        return $this;
    }

    /**
     * Gets parentOrganization.
     *
     * @return Organization
     */
    public function getParentOrganization()
    {
        return $this->parentOrganization;
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
     * Sets subOrganization.
     *
     * @param Organization $subOrganization
     *
     * @return $this
     */
    public function setSubOrganization(Organization $subOrganization = null)
    {
        $this->subOrganization = $subOrganization;

        return $this;
    }

    /**
     * Gets subOrganization.
     *
     * @return Organization
     */
    public function getSubOrganization()
    {
        return $this->subOrganization;
    }

    /**
     * Sets taxID.
     *
     * @param string $taxID
     *
     * @return $this
     */
    public function setTaxID($taxID)
    {
        $this->taxID = $taxID;

        return $this;
    }

    /**
     * Gets taxID.
     *
     * @return string
     */
    public function getTaxID()
    {
        return $this->taxID;
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
     * Sets vatID.
     *
     * @param string $vatID
     *
     * @return $this
     */
    public function setVatID($vatID)
    {
        $this->vatID = $vatID;

        return $this;
    }

    /**
     * Gets vatID.
     *
     * @return string
     */
    public function getVatID()
    {
        return $this->vatID;
    }
}
