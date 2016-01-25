<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/Thing Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
abstract class Thing extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * @var string An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the 'typeof' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.
     */
    private $additionalType;

    /**
     * @var string An alias for the item.
     */
    private $alternateName;

    /**
     * @var string A short description of the item.
     */
    private $description;

    /**
     * @var ImageObject An image of the item. This can be a [URL](http://schema.org/URL) or a fully described [ImageObject](http://schema.org/ImageObject).
     */
    private $image;

    /**
     * @var string Indicates a page (or other CreativeWork) for which this thing is the main entity being described.
     *
     *             See [background notes](/docs/datamodel.html#mainEntityBackground) for details.
     */
    private $mainEntityOfPage;

    /**
     * @var string The name of the item.
     */
    private $name;

    /**
     * @var string|array multiple URLs of a reference Web page that unambiguously indicates the item's identity. E.g. the URL of the item's Wikipedia page, Freebase page, or official website.
     */
    private $sameAs;

    /**
     * @var string URL of the item.
     */
    private $url;

    /**
     * @var Action Indicates a potential Action, which describes an idealized action in which this thing would play an 'object' role.
     */
    private $potentialAction;

    /**
     * Sets additionalType.
     *
     * @param string $additionalType
     *
     * @return $this
     */
    public function setAdditionalType($additionalType) {
        $this->additionalType = $additionalType;

        return $this;
    }

    /**
     * Gets additionalType.
     *
     * @return string
     */
    public function getAdditionalType() {
        return $this->additionalType;
    }

    /**
     * Sets alternateName.
     *
     * @param string $alternateName
     *
     * @return $this
     */
    public function setAlternateName($alternateName) {
        $this->alternateName = $alternateName;

        return $this;
    }

    /**
     * Gets alternateName.
     *
     * @return string
     */
    public function getAlternateName() {
        return $this->alternateName;
    }

    /**
     * Sets description.
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets description.
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Sets image.
     *
     * @param ImageObject $image
     *
     * @return $this
     */
    public function setImage(ImageObject $image = NULL) {
        $this->image = $image;

        return $this;
    }

    /**
     * Gets image.
     *
     * @return ImageObject
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Sets mainEntityOfPage.
     *
     * @param string $mainEntityOfPage
     *
     * @return $this
     */
    public function setMainEntityOfPage($mainEntityOfPage) {
        $this->mainEntityOfPage = $mainEntityOfPage;

        return $this;
    }

    /**
     * Gets mainEntityOfPage.
     *
     * @return string
     */
    public function getMainEntityOfPage() {
        return $this->mainEntityOfPage;
    }

    /**
     * Sets name.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets name.
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Sets sameAs.
     *
     * @param string|array $sameAs
     *
     * @return $this
     */
    public function setSameAs($sameAs) {
        $this->sameAs = $sameAs;

        return $this;
    }

    /**
     * Gets sameAs.
     *
     * @return string|array
     */
    public function getSameAs() {
        return $this->sameAs;
    }

    /**
     * Sets url.
     *
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url) {
        $this->url = $url;

        return $this;
    }

    /**
     * Gets url.
     *
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Sets potentialAction.
     *
     * @param Action $potentialAction
     *
     * @return $this
     */
    public function setPotentialAction(Action $potentialAction = NULL) {
        $this->potentialAction = $potentialAction;

        return $this;
    }

    /**
     * Gets potentialAction.
     *
     * @return Action
     */
    public function getPotentialAction() {
        return $this->potentialAction;
    }
}
