<?php
namespace Portrino\PxSemantic\Processor;

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

use Portrino\PxSemantic\SchemaOrg\Thing;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;

/**
 * Class PageProcessor
 *
 * @package Portrino\PxSemantic\Processor
 */
class PageProcessor extends \Portrino\PxSemantic\Processor\AbstractProcessor
{

    /**
     * @var \Portrino\PxSemantic\Domain\Model\Page
     */
    protected $currentPage = null;

    /**
     * @var int
     */
    protected $currentPageUid;

    /**
     * @var \Portrino\PxSemantic\Domain\Repository\PageRepository
     * @inject
     */
    protected $pageRepository;

    /**
     *  Initializes the processor before invoking the process method
     *
     * @return void
     */
    public function initializeObject()
    {
        parent::initializeObject();
        $this->currentPageUid = $this->typoScriptFrontendController->id;
        $this->currentPage = $this->pageRepository->findByUid($this->currentPageUid);
    }

    /**
     * @param Thing $entity
     * @param array $settings
     * @param int|null $resourceId
     */
    public function process(&$entity, $settings = [], $resourceId = null)
    {
        if ($resourceId != null) {
            $page = $this->pageRepository->findByUid((int)$resourceId);
        } else {
            if ($this->resourceId != null) {
                $page = $this->pageRepository->findByUid((int)$this->resourceId);
            } else {
                $page = $this->currentPage;
            }
        }

        if ($page && $entity instanceof \Portrino\PxSemantic\SchemaOrg\CreativeWork) {
            $url = $this->uriBuilder->setTargetPageUid($page->getUid())->build();

            $entity->setId($url);

            // set the name to the navTitle / title of the page
            $name = $page->getNavTitle() ? $page->getNavTitle() : $page->getTitle();
            if ($name != '') {
                $entity->setName($name);
            }

            // set the headline to the title of the page
            $entity->setHeadline($page->getTitle());

            /**
             * set the url
             */
            $entity->setUrl($url);
            $entity->setMainEntityOfPage($url);

            // set the datePublished to the starttime if set, if not take the crDate of the page
            $datePublished = $page->getStarttime() ? $page->getStarttime() : $page->getCrdate();
            $entity->setDatePublished($datePublished);

            // set the dateModified to the tstamp of the page
            $dataModified = $page->getTstamp();
            $entity->setDateModified($dataModified);

            // set the description to the abstract of the page
            $description = $page->getAbstract() ? $page->getAbstract() : $page->getDescription();
            if ($description != '') {
                $entity->setDescription($description);
            }

            if ($page->getAuthor() != '') {
                /**
                 * set the author to the author of the page if it is set
                 *
                 * @var \Portrino\PxSemantic\SchemaOrg\Person $author
                 */
                $author = $this->objectManager->get(\Portrino\PxSemantic\SchemaOrg\Person::class);
                $author->setName($page->getAuthor());
                $entity->setAuthor($author);
            }




            // set the image to the first image into resources/media list of the page
            $media = $page->getMedia();
            if ($media != null && $media->count() > 0) {
                /** @var \TYPO3\CMS\Extbase\Domain\Model\FileReference $image */
                $image = $media->toArray()[0];
                if ($image->getOriginalResource()->getType() === \TYPO3\CMS\Core\Resource\AbstractFile::FILETYPE_IMAGE) {
                    $image = $this->imageService->getImage('', $image, true);

                    $width = $settings['media']['width'] ? (int)$settings['media']['width'] : 696;
                    $height = $settings['media']['height'] ? (int)$settings['media']['height'] : 'auto';

                    $processingInstructions = [
                        'width' => $width,
                        'height' => $height,
                    ];

                    $processedImage = $this->imageService->applyProcessingInstructions($image, $processingInstructions);

                    if ($processedImage) {
                        /** @var \Portrino\PxSemantic\SchemaOrg\ImageObject $imageObject */
                        $imageObject = $this->objectManager->get(\Portrino\PxSemantic\SchemaOrg\ImageObject::class);

                        $imageObject->setWidth((int)$processedImage->getProperty('width'));
                        $imageObject->setHeight((int)$processedImage->getProperty('height'));
                        $imageObject->setUrl($this->imageService->getImageUri($processedImage));

                        $entity->setImage($imageObject);
                    }
                }
            }
        }
    }
}