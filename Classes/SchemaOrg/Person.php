<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A person (alive, dead, undead, or fictional).
 *
 * @see http://schema.org/Person Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Person extends Thing {

    /**
     * @var int
     */
    private $id;

    /**
     * @var string An additional name for a Person, can be used for a middle name.
     */
    private $additionalName;

    /**
     * @var PostalAddress Physical address of the item.
     */
    private $address;

    /**
     * @var Organization An organization that this person is affiliated with. For example, a school/university, a club, or a team.
     */
    private $affiliation;

    /**
     * @var Organization An organization that the person is an alumni of.
     */
    private $alumniOf;

    /**
     * @var string An award won by or for this item.
     */
    private $award;

    /**
     * @var \DateTime Date of birth.
     */
    private $birthDate;

    /**
     * @var Organization The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.
     */
    private $brand;

    /**
     * @var Person A child of the person.
     */
    private $children;

    /**
     * @var Person A colleague of the person.
     */
    private $colleague;

    /**
     * @var ContactPoint A contact point for a person or organization.
     */
    private $contactPoint;

    /**
     * @var \DateTime Date of death.
     */
    private $deathDate;

    /**
     * @var string The Dun & Bradstreet DUNS number for identifying an organization or business person.
     */
    private $duns;

    /**
     * @var string Email address.
     */
    private $email;

    /**
     * @var string Family name. In the U.S., the last name of an Person. This can be used along with givenName instead of the name property.
     */
    private $familyName;

    /**
     * @var string The fax number.
     */
    private $faxNumber;

    /**
     * @var Person The most generic uni-directional social relation.
     */
    private $follows;

    /**
     * @var string Gender of the person. While http://schema.org/Male and http://schema.org/Female may be used, text strings are also acceptable for people who do not identify as a binary gender.
     */
    private $gender;

    /**
     * @var string Given name. In the U.S., the first name of a Person. This can be used along with familyName instead of the name property.
     */
    private $givenName;

    /**
     * @var string The [Global Location Number](http://www.gs1.org/gln) (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.
     */
    private $globalLocationNumber;

    /**
     * @var QuantitativeValue The height of the item.
     */
    private $height;

    /**
     * @var ContactPoint A contact location for a person's residence.
     */
    private $homeLocation;

    /**
     * @var string An honorific prefix preceding a Person's name such as Dr/Mrs/Mr.
     */
    private $honorificPrefix;

    /**
     * @var string An honorific suffix preceding a Person's name such as M.D. /PhD/MSCSW.
     */
    private $honorificSuffix;

    /**
     * @var string The International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place.
     */
    private $isicV4;

    /**
     * @var string The job title of the person (for example, Financial Manager).
     */
    private $jobTitle;

    /**
     * @var Person The most generic bi-directional social/work relation.
     */
    private $knows;

    /**
     * @var Organization An Organization (or ProgramMembership) to which this Person or Organization belongs.
     */
    private $memberOf;

    /**
     * @var string The North American Industry Classification System (NAICS) code for a particular organization or business person.
     */
    private $naics;

    /**
     * @var Country Nationality of the person.
     */
    private $nationality;

    /**
     * @var Person A parent of this person.
     */
    private $parent;

    /**
     * @var Person The most generic familial relation.
     */
    private $relatedTo;

    /**
     * @var Person A sibling of the person.
     */
    private $sibling;

    /**
     * @var Organization A person or organization that supports a thing through a pledge, promise, or financial contribution. e.g. a sponsor of a Medical Study or a corporate sponsor of an event.
     */
    private $sponsor;

    /**
     * @var string The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US or the CIF/NIF in Spain.
     */
    private $taxID;

    /**
     * @var string The telephone number.
     */
    private $telephone;

    /**
     * @var string The Value-added Tax ID of the organization or person.
     */
    private $vatID;

    /**
     * @var QuantitativeValue The weight of the product or person.
     */
    private $weight;

    /**
     * @var ContactPoint A contact location for a person's place of work.
     */
    private $workLocation;

    /**
     * @var Organization Organizations that the person works for.
     */
    private $worksFor;

    /**
     * @var Place The place where the person was born.
     */
    private $birthPlace;

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
     * Sets additionalName.
     *
     * @param string $additionalName
     *
     * @return $this
     */
    public function setAdditionalName($additionalName) {
        $this->additionalName = $additionalName;

        return $this;
    }

    /**
     * Gets additionalName.
     *
     * @return string
     */
    public function getAdditionalName() {
        return $this->additionalName;
    }

    /**
     * Sets address.
     *
     * @param PostalAddress $address
     *
     * @return $this
     */
    public function setAddress(PostalAddress $address = NULL) {
        $this->address = $address;

        return $this;
    }

    /**
     * Gets address.
     *
     * @return PostalAddress
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Sets affiliation.
     *
     * @param Organization $affiliation
     *
     * @return $this
     */
    public function setAffiliation(Organization $affiliation = NULL) {
        $this->affiliation = $affiliation;

        return $this;
    }

    /**
     * Gets affiliation.
     *
     * @return Organization
     */
    public function getAffiliation() {
        return $this->affiliation;
    }

    /**
     * Sets alumniOf.
     *
     * @param Organization $alumniOf
     *
     * @return $this
     */
    public function setAlumniOf(Organization $alumniOf = NULL) {
        $this->alumniOf = $alumniOf;

        return $this;
    }

    /**
     * Gets alumniOf.
     *
     * @return Organization
     */
    public function getAlumniOf() {
        return $this->alumniOf;
    }

    /**
     * Sets award.
     *
     * @param string $award
     *
     * @return $this
     */
    public function setAward($award) {
        $this->award = $award;

        return $this;
    }

    /**
     * Gets award.
     *
     * @return string
     */
    public function getAward() {
        return $this->award;
    }

    /**
     * Sets birthDate.
     *
     * @param \DateTime $birthDate
     *
     * @return $this
     */
    public function setBirthDate(\DateTime $birthDate = NULL) {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Gets birthDate.
     *
     * @return \DateTime
     */
    public function getBirthDate() {
        return $this->birthDate;
    }

    /**
     * Sets brand.
     *
     * @param Organization $brand
     *
     * @return $this
     */
    public function setBrand(Organization $brand = NULL) {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Gets brand.
     *
     * @return Organization
     */
    public function getBrand() {
        return $this->brand;
    }

    /**
     * Sets children.
     *
     * @param Person $children
     *
     * @return $this
     */
    public function setChildren(Person $children = NULL) {
        $this->children = $children;

        return $this;
    }

    /**
     * Gets children.
     *
     * @return Person
     */
    public function getChildren() {
        return $this->children;
    }

    /**
     * Sets colleague.
     *
     * @param Person $colleague
     *
     * @return $this
     */
    public function setColleague(Person $colleague = NULL) {
        $this->colleague = $colleague;

        return $this;
    }

    /**
     * Gets colleague.
     *
     * @return Person
     */
    public function getColleague() {
        return $this->colleague;
    }

    /**
     * Sets contactPoint.
     *
     * @param ContactPoint $contactPoint
     *
     * @return $this
     */
    public function setContactPoint(ContactPoint $contactPoint = NULL) {
        $this->contactPoint = $contactPoint;

        return $this;
    }

    /**
     * Gets contactPoint.
     *
     * @return ContactPoint
     */
    public function getContactPoint() {
        return $this->contactPoint;
    }

    /**
     * Sets deathDate.
     *
     * @param \DateTime $deathDate
     *
     * @return $this
     */
    public function setDeathDate(\DateTime $deathDate = NULL) {
        $this->deathDate = $deathDate;

        return $this;
    }

    /**
     * Gets deathDate.
     *
     * @return \DateTime
     */
    public function getDeathDate() {
        return $this->deathDate;
    }

    /**
     * Sets duns.
     *
     * @param string $duns
     *
     * @return $this
     */
    public function setDuns($duns) {
        $this->duns = $duns;

        return $this;
    }

    /**
     * Gets duns.
     *
     * @return string
     */
    public function getDuns() {
        return $this->duns;
    }

    /**
     * Sets email.
     *
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets email.
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Sets familyName.
     *
     * @param string $familyName
     *
     * @return $this
     */
    public function setFamilyName($familyName) {
        $this->familyName = $familyName;

        return $this;
    }

    /**
     * Gets familyName.
     *
     * @return string
     */
    public function getFamilyName() {
        return $this->familyName;
    }

    /**
     * Sets faxNumber.
     *
     * @param string $faxNumber
     *
     * @return $this
     */
    public function setFaxNumber($faxNumber) {
        $this->faxNumber = $faxNumber;

        return $this;
    }

    /**
     * Gets faxNumber.
     *
     * @return string
     */
    public function getFaxNumber() {
        return $this->faxNumber;
    }

    /**
     * Sets follows.
     *
     * @param Person $follows
     *
     * @return $this
     */
    public function setFollows(Person $follows = NULL) {
        $this->follows = $follows;

        return $this;
    }

    /**
     * Gets follows.
     *
     * @return Person
     */
    public function getFollows() {
        return $this->follows;
    }

    /**
     * Sets gender.
     *
     * @param string $gender
     *
     * @return $this
     */
    public function setGender($gender) {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Gets gender.
     *
     * @return string
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * Sets givenName.
     *
     * @param string $givenName
     *
     * @return $this
     */
    public function setGivenName($givenName) {
        $this->givenName = $givenName;

        return $this;
    }

    /**
     * Gets givenName.
     *
     * @return string
     */
    public function getGivenName() {
        return $this->givenName;
    }

    /**
     * Sets globalLocationNumber.
     *
     * @param string $globalLocationNumber
     *
     * @return $this
     */
    public function setGlobalLocationNumber($globalLocationNumber) {
        $this->globalLocationNumber = $globalLocationNumber;

        return $this;
    }

    /**
     * Gets globalLocationNumber.
     *
     * @return string
     */
    public function getGlobalLocationNumber() {
        return $this->globalLocationNumber;
    }

    /**
     * Sets height.
     *
     * @param QuantitativeValue $height
     *
     * @return $this
     */
    public function setHeight(QuantitativeValue $height = NULL) {
        $this->height = $height;

        return $this;
    }

    /**
     * Gets height.
     *
     * @return QuantitativeValue
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * Sets homeLocation.
     *
     * @param ContactPoint $homeLocation
     *
     * @return $this
     */
    public function setHomeLocation(ContactPoint $homeLocation = NULL) {
        $this->homeLocation = $homeLocation;

        return $this;
    }

    /**
     * Gets homeLocation.
     *
     * @return ContactPoint
     */
    public function getHomeLocation() {
        return $this->homeLocation;
    }

    /**
     * Sets honorificPrefix.
     *
     * @param string $honorificPrefix
     *
     * @return $this
     */
    public function setHonorificPrefix($honorificPrefix) {
        $this->honorificPrefix = $honorificPrefix;

        return $this;
    }

    /**
     * Gets honorificPrefix.
     *
     * @return string
     */
    public function getHonorificPrefix() {
        return $this->honorificPrefix;
    }

    /**
     * Sets honorificSuffix.
     *
     * @param string $honorificSuffix
     *
     * @return $this
     */
    public function setHonorificSuffix($honorificSuffix) {
        $this->honorificSuffix = $honorificSuffix;

        return $this;
    }

    /**
     * Gets honorificSuffix.
     *
     * @return string
     */
    public function getHonorificSuffix() {
        return $this->honorificSuffix;
    }

    /**
     * Sets isicV4.
     *
     * @param string $isicV4
     *
     * @return $this
     */
    public function setIsicV4($isicV4) {
        $this->isicV4 = $isicV4;

        return $this;
    }

    /**
     * Gets isicV4.
     *
     * @return string
     */
    public function getIsicV4() {
        return $this->isicV4;
    }

    /**
     * Sets jobTitle.
     *
     * @param string $jobTitle
     *
     * @return $this
     */
    public function setJobTitle($jobTitle) {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * Gets jobTitle.
     *
     * @return string
     */
    public function getJobTitle() {
        return $this->jobTitle;
    }

    /**
     * Sets knows.
     *
     * @param Person $knows
     *
     * @return $this
     */
    public function setKnows(Person $knows = NULL) {
        $this->knows = $knows;

        return $this;
    }

    /**
     * Gets knows.
     *
     * @return Person
     */
    public function getKnows() {
        return $this->knows;
    }

    /**
     * Sets memberOf.
     *
     * @param Organization $memberOf
     *
     * @return $this
     */
    public function setMemberOf(Organization $memberOf = NULL) {
        $this->memberOf = $memberOf;

        return $this;
    }

    /**
     * Gets memberOf.
     *
     * @return Organization
     */
    public function getMemberOf() {
        return $this->memberOf;
    }

    /**
     * Sets naics.
     *
     * @param string $naics
     *
     * @return $this
     */
    public function setNaics($naics) {
        $this->naics = $naics;

        return $this;
    }

    /**
     * Gets naics.
     *
     * @return string
     */
    public function getNaics() {
        return $this->naics;
    }

    /**
     * Sets nationality.
     *
     * @param Country $nationality
     *
     * @return $this
     */
    public function setNationality(Country $nationality = NULL) {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Gets nationality.
     *
     * @return Country
     */
    public function getNationality() {
        return $this->nationality;
    }

    /**
     * Sets parent.
     *
     * @param Person $parent
     *
     * @return $this
     */
    public function setParent(Person $parent = NULL) {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Gets parent.
     *
     * @return Person
     */
    public function getParent() {
        return $this->parent;
    }

    /**
     * Sets relatedTo.
     *
     * @param Person $relatedTo
     *
     * @return $this
     */
    public function setRelatedTo(Person $relatedTo = NULL) {
        $this->relatedTo = $relatedTo;

        return $this;
    }

    /**
     * Gets relatedTo.
     *
     * @return Person
     */
    public function getRelatedTo() {
        return $this->relatedTo;
    }

    /**
     * Sets sibling.
     *
     * @param Person $sibling
     *
     * @return $this
     */
    public function setSibling(Person $sibling = NULL) {
        $this->sibling = $sibling;

        return $this;
    }

    /**
     * Gets sibling.
     *
     * @return Person
     */
    public function getSibling() {
        return $this->sibling;
    }

    /**
     * Sets sponsor.
     *
     * @param Organization $sponsor
     *
     * @return $this
     */
    public function setSponsor(Organization $sponsor = NULL) {
        $this->sponsor = $sponsor;

        return $this;
    }

    /**
     * Gets sponsor.
     *
     * @return Organization
     */
    public function getSponsor() {
        return $this->sponsor;
    }

    /**
     * Sets taxID.
     *
     * @param string $taxID
     *
     * @return $this
     */
    public function setTaxID($taxID) {
        $this->taxID = $taxID;

        return $this;
    }

    /**
     * Gets taxID.
     *
     * @return string
     */
    public function getTaxID() {
        return $this->taxID;
    }

    /**
     * Sets telephone.
     *
     * @param string $telephone
     *
     * @return $this
     */
    public function setTelephone($telephone) {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Gets telephone.
     *
     * @return string
     */
    public function getTelephone() {
        return $this->telephone;
    }

    /**
     * Sets vatID.
     *
     * @param string $vatID
     *
     * @return $this
     */
    public function setVatID($vatID) {
        $this->vatID = $vatID;

        return $this;
    }

    /**
     * Gets vatID.
     *
     * @return string
     */
    public function getVatID() {
        return $this->vatID;
    }

    /**
     * Sets weight.
     *
     * @param QuantitativeValue $weight
     *
     * @return $this
     */
    public function setWeight(QuantitativeValue $weight = NULL) {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Gets weight.
     *
     * @return QuantitativeValue
     */
    public function getWeight() {
        return $this->weight;
    }

    /**
     * Sets workLocation.
     *
     * @param ContactPoint $workLocation
     *
     * @return $this
     */
    public function setWorkLocation(ContactPoint $workLocation = NULL) {
        $this->workLocation = $workLocation;

        return $this;
    }

    /**
     * Gets workLocation.
     *
     * @return ContactPoint
     */
    public function getWorkLocation() {
        return $this->workLocation;
    }

    /**
     * Sets worksFor.
     *
     * @param Organization $worksFor
     *
     * @return $this
     */
    public function setWorksFor(Organization $worksFor = NULL) {
        $this->worksFor = $worksFor;

        return $this;
    }

    /**
     * Gets worksFor.
     *
     * @return Organization
     */
    public function getWorksFor() {
        return $this->worksFor;
    }

    /**
     * Sets birthPlace.
     *
     * @param Place $birthPlace
     *
     * @return $this
     */
    public function setBirthPlace(Place $birthPlace = NULL) {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    /**
     * Gets birthPlace.
     *
     * @return Place
     */
    public function getBirthPlace() {
        return $this->birthPlace;
    }
}
