<?php
namespace Portrino\PxSemantic\Domain\Model;

    /***************************************************************
     *  Copyright notice
     *
     *  (c) 2015 Andre Wuttig <wuttig@portrino.de>, portrino GmbH
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
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Page
 *
 * @package Portrino\PxSemantic\Domain\Model
 */
class Page extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var \DateTime $tstamp
     */
    protected $tstamp;

    /**
     * @var \DateTime $crdate
     */
    protected $crdate;

    /**
     * @var string $title
     */
    protected $title;

    /**
     * @var integer $doktype
     */
    protected $doktype;

    /**
     * @var \DateTime $starttime
     */
    protected $starttime;

    /**
     * @var \DateTime $endtime
     */
    protected $endtime;

    /**
     * @var string $subtitle
     */
    protected $subtitle;

    /**
     * @var integer $layout
     */
    protected $layout;

    /**
     * @var string $keywords
     */
    protected $keywords;

    /**
     * @var string $description
     */
    protected $description;

    /**
     * @var string $abstract
     */
    protected $abstract;

    /**
     * @var string $author
     */
    protected $author;

    /**
     * @var string $authorEmail
     */
    protected $authorEmail;

    /**
     * @var string $navTitle
     */
    protected $navTitle;

    /**
     * @var string $alias
     */
    protected $alias;

    /**
     * @var integer $backendLayout
     */
    protected $backendLayout;

    /**
     * @var boolean $hidden
     */
    protected $hidden;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $media
     */
    protected $media;

    /**
     * @var \Portrino\PxSemantic\Domain\Repository\PageRepository
     * @inject
     */
    protected $pageRepository;

    /**
     * __construct
     */
    public function __construct() {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     *
     * @return void
     */
    protected function initStorageObjects() {
        $this->media = new ObjectStorage();
    }


    /**
     * @param string $abstract
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
    }

    /**
     * @return string
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * @param string $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $authorEmail
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;
    }

    /**
     * @return string
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * @param int $backendLayout
     */
    public function setBackendLayout($backendLayout)
    {
        $this->backendLayout = $backendLayout;
    }

    /**
     * @return int
     */
    public function getBackendLayout()
    {
        return $this->backendLayout;
    }

    /**
     * @param \DateTime $crdate
     */
    public function setCrdate($crdate)
    {
        $this->crdate = $crdate;
    }

    /**
     * @return \DateTime
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param int $doktype
     */
    public function setDoktype($doktype)
    {
        $this->doktype = $doktype;
    }

    /**
     * @return int
     */
    public function getDoktype()
    {
        return $this->doktype;
    }

    /**
     * @param \DateTime $endtime
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;
    }

    /**
     * @return \DateTime
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * @param boolean $hidden
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
    }

    /**
     * @return boolean
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param int $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * @return int
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param string $navTitle
     */
    public function setNavTitle($navTitle)
    {
        $this->navTitle = $navTitle;
    }

    /**
     * @return string
     */
    public function getNavTitle()
    {
        return $this->navTitle;
    }

    /**
     * @param \DateTime $starttime
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;
    }

    /**
     * @return \DateTime
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * @param string $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param \DateTime $tstamp
     */
    public function setTstamp($tstamp)
    {
        $this->tstamp = $tstamp;
    }

    /**
     * @return \DateTime
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

    /**
     * @return NULL|\Portrino\PxSemantic\Domain\Model\Page
     */
    public function getParent()
    {
        return $this->pageRepository->findByUid($this->getPid());
    }

    /**
     * @return NULL|\TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Portrino\PxSemantic\Domain\Model\Page>
     */
    public function getChildPages()
    {
        return $this->pageRepository->findByPid($this->getUid());
    }

    /**
     * @return NULL|\Portrino\PxSemantic\Domain\Model\Page
     */
    public function getPreviousPage()
    {
        $result = null;
        $siblings = $this->pageRepository->findByPid($this->getPid());
        $nextIsResult = false;
        foreach ($siblings as $sibling) {
            if ($nextIsResult) {
                $result = $sibling;
                break;
            }
            $nextIsResult = ($sibling === $this);
        }
        return $result;
    }

    /**
     * @return NULL|\Portrino\PxSemantic\Domain\Model\Page
     */
    public function getNextPage()
    {
        $result = null;
        $siblings = $this->pageRepository->findByPid($this->getPid());
        $previousIsResult = false;
        $prevSibling = null;
        foreach ($siblings as $sibling) {
            if ($sibling === $this) {
                $result = $prevSibling;
                break;
            }
            $prevSibling = $sibling;
        }
        return $result;
    }

}