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

namespace Portrino\PxSemantic\SchemaOrg\Enum;

use MyCLabs\Enum\Enum;

/**
 * The status of an Action.
 *
 * @see http://schema.org/ActionStatusType Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class ActionStatusType extends Enum
{
    /**
     * @var string A description of an action that is supported
     */
    const POTENTIAL_ACTION_STATUS = 'http://schema.org/PotentialActionStatus';

    /**
     * @var string An in-progress action (e.g, while watching the movie, or driving to a location)
     */
    const ACTIVE_ACTION_STATUS = 'http://schema.org/ActiveActionStatus';

    /**
     * @var string An action that has already taken place
     */
    const COMPLETED_ACTION_STATUS = 'http://schema.org/CompletedActionStatus';

    /**
     * @var string An action that failed to complete. The action's error property and the HTTP return code contain more information about the failure
     */
    const FAILED_ACTION_STATUS = 'http://schema.org/FailedActionStatus';

    /**
     * @var string An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the 'typeof' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally
     */
    private $additionalType;

    /**
     * @var string An alias for the item
     */
    private $alternateName;

    /**
     * @var string A description of the item
     */
    private $description;

    /**
     * @var string A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation
     */
    private $disambiguatingDescription;

    /**
     * @var string An image of the item. This can be a \[\[URL\]\] or a fully described \[\[ImageObject\]\]
     */
    private $image;

    /**
     * @var CreativeWork Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See \[background notes\](/docs/datamodel.html#mainEntityBackground) for details
     */
    private $mainEntityOfPage;

    /**
     * @var string The name of the item
     */
    private $name;

    /**
     * @var string URL of a reference Web page that unambiguously indicates the item's identity. E.g. the URL of the item's Wikipedia page, Wikidata entry, or official website
     */
    private $sameAs;

    /**
     * @var string URL of the item
     */
    private $url;

    /**
     * @var Action Indicates a potential Action, which describes an idealized action in which this thing would play an 'object' role
     */
    private $potentialAction;

    /**
     * @var string The identifier property represents any kind of identifier for any kind of \[\[Thing\]\], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See \[background notes\](/docs/datamodel.html#identifierBg) for more details
     */
    private $identifier;

    /**
     * Sets additionalType.
     *
     * @param string $additionalType
     *
     * @return $this
     */
    public function setAdditionalType($additionalType)
    {
        $this->additionalType = $additionalType;

        return $this;
    }

    /**
     * Gets additionalType.
     *
     * @return string
     */
    public function getAdditionalType()
    {
        return $this->additionalType;
    }

    /**
     * Sets alternateName.
     *
     * @param string $alternateName
     *
     * @return $this
     */
    public function setAlternateName($alternateName)
    {
        $this->alternateName = $alternateName;

        return $this;
    }

    /**
     * Gets alternateName.
     *
     * @return string
     */
    public function getAlternateName()
    {
        return $this->alternateName;
    }

    /**
     * Sets description.
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
     * Sets image.
     *
     * @param string $image
     *
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Gets image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets mainEntityOfPage.
     *
     * @param CreativeWork $mainEntityOfPage
     *
     * @return $this
     */
    public function setMainEntityOfPage(CreativeWork $mainEntityOfPage = null)
    {
        $this->mainEntityOfPage = $mainEntityOfPage;

        return $this;
    }

    /**
     * Gets mainEntityOfPage.
     *
     * @return CreativeWork
     */
    public function getMainEntityOfPage()
    {
        return $this->mainEntityOfPage;
    }

    /**
     * Sets name.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets sameAs.
     *
     * @param string $sameAs
     *
     * @return $this
     */
    public function setSameAs($sameAs)
    {
        $this->sameAs = $sameAs;

        return $this;
    }

    /**
     * Gets sameAs.
     *
     * @return string
     */
    public function getSameAs()
    {
        return $this->sameAs;
    }

    /**
     * Sets url.
     *
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Gets url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets potentialAction.
     *
     * @param Action $potentialAction
     *
     * @return $this
     */
    public function setPotentialAction(Action $potentialAction = null)
    {
        $this->potentialAction = $potentialAction;

        return $this;
    }

    /**
     * Gets potentialAction.
     *
     * @return Action
     */
    public function getPotentialAction()
    {
        return $this->potentialAction;
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
