<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A web page. Every web page is implicitly assumed to be declared to be of type WebPage, so the various properties about that webpage, such as `breadcrumb` may be used. We recommend explicit declaration if these properties are specified, but if they are found outside of an itemscope, they will be assumed to be about the page.
 *
 * @see http://schema.org/WebPage Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class WebPage extends CreativeWork
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string A set of links that can help a user understand and navigate a website hierarchy.
     */
    private $breadcrumb;
    /**
     * @var \DateTime Date on which the content on this web page was last reviewed for accuracy and/or completeness.
     */
    private $lastReviewed;
    /**
     * @var ImageObject Indicates the main image on the page.
     */
    private $primaryImageOfPage;
    /**
     * @var string A link related to this web page, for example to other related web pages.
     */
    private $relatedLink;

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
     * Sets breadcrumb.
     *
     * @param string $breadcrumb
     *
     * @return $this
     */
    public function setBreadcrumb($breadcrumb)
    {
        $this->breadcrumb = $breadcrumb;

        return $this;
    }

    /**
     * Gets breadcrumb.
     *
     * @return string
     */
    public function getBreadcrumb()
    {
        return $this->breadcrumb;
    }

    /**
     * Sets lastReviewed.
     *
     * @param \DateTime $lastReviewed
     *
     * @return $this
     */
    public function setLastReviewed(\DateTime $lastReviewed = null)
    {
        $this->lastReviewed = $lastReviewed;

        return $this;
    }

    /**
     * Gets lastReviewed.
     *
     * @return \DateTime
     */
    public function getLastReviewed()
    {
        return $this->lastReviewed;
    }

    /**
     * Sets primaryImageOfPage.
     *
     * @param ImageObject $primaryImageOfPage
     *
     * @return $this
     */
    public function setPrimaryImageOfPage(ImageObject $primaryImageOfPage = null)
    {
        $this->primaryImageOfPage = $primaryImageOfPage;

        return $this;
    }

    /**
     * Gets primaryImageOfPage.
     *
     * @return ImageObject
     */
    public function getPrimaryImageOfPage()
    {
        return $this->primaryImageOfPage;
    }

    /**
     * Sets relatedLink.
     *
     * @param string $relatedLink
     *
     * @return $this
     */
    public function setRelatedLink($relatedLink)
    {
        $this->relatedLink = $relatedLink;

        return $this;
    }

    /**
     * Gets relatedLink.
     *
     * @return string
     */
    public function getRelatedLink()
    {
        return $this->relatedLink;
    }
}
