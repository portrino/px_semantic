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
     * @var string A set of links that can help a user understand and navigate a website hierarchy
     */
    protected $breadcrumb;

    /**
     * @var \DateTime Date on which the content on this web page was last reviewed for accuracy and/or completeness
     */
    protected $lastReviewed;

    /**
     * @var ImageObject Indicates the main image on the page
     */
    protected $primaryImageOfPage;

    /**
     * @var string A link related to this web page, for example to other related web pages
     */
    protected $relatedLink;

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
