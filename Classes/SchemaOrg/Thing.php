<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Andre Wuttig <wuttig@portrino.de>, portrino GmbH
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

use Portrino\PxSemantic\Entity\EntityInterface;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;
use TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/Thing Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Thing implements EntityInterface
{

    /**
     * @var int The entity`s IRI
     */
    protected $id;

    /**
     * @var string http://schema.org/
     */
    protected $context = 'http://schema.org/';

    /**
     * @var string An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the 'typeof' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally
     */
    protected $additionalType;

    /**
     * @var string An alias for the item
     */
    protected $alternateName;

    /**
     * @var string A description of the item
     */
    protected $description;

    /**
     * @var ImageObject An image of the item. This can be a [[URL]] or a fully described [[ImageObject]]
     */
    protected $image;

    /**
     * @var string Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details
     */
    protected $mainEntityOfPage;

    /**
     * @var string The name of the item
     */
    protected $name;

    /**
     * @var string URL of a reference Web page that unambiguously indicates the item's identity. E.g. the URL of the item's Wikipedia page, Freebase page, or official website
     */
    protected $sameAs;

    /**
     * @var string URL of the item
     */
    protected $url;

    /**
     * @var Action Indicates a potential Action, which describes an idealized action in which this thing would play an 'object' role
     */
    protected $potentialAction;

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
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @return string
     */
    public function getType()
    {
        $reflect = new \ReflectionClass($this);
        return $reflect->getShortName();
    }

    /**
     * @param string $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


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
     * Sets image.
     *
     * @param ImageObject $image
     *
     * @return $this
     */
    public function setImage(ImageObject $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Gets image.
     *
     * @return ImageObject
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets mainEntityOfPage.
     *
     * @param string $mainEntityOfPage
     *
     * @return $this
     */
    public function setMainEntityOfPage($mainEntityOfPage)
    {
        $this->mainEntityOfPage = $mainEntityOfPage;

        return $this;
    }

    /**
     * Gets mainEntityOfPage.
     *
     * @return string
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

}
