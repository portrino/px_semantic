<?php
namespace Portrino\PxSemantic\Processor;

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

use TYPO3\CMS\Extbase\Reflection\ObjectAccess;

/**
 * Class PageProcessor
 *
 * @package Portrino\PxSemantic\Processor
 */
class PageProcessor implements \Portrino\PxSemantic\Processor\ProcessorInterface {

    /**
     * @var \Portrino\PxSemantic\Domain\Model\Page
     */
    protected $currentPage = NULL;

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
     * @var \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
     */
    protected $typoScriptFrontendController;

    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
     * @inject
     */
    protected $objectManager;

    /**
     * @var \TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder
     * @inject
     */
    protected $uriBuilder;

    /**
     * @var \TYPO3\CMS\Extbase\Service\ImageService
     * @inject
     */
    protected $imageService;

    /**
     * Initializes the controller before invoking an action method.
     *
     * Override this method to solve tasks which all actions have in
     * common.
     *
     * @return void
     */
    public function initializeObject() {
        if (TYPO3_MODE === 'FE') {
            $this->typoScriptFrontendController = $GLOBALS['TSFE'];
            $this->currentPageUid = $this->typoScriptFrontendController->id;
            $this->currentPage = $this->pageRepository->findByUid($this->currentPageUid);
        }
    }

    /**
     * @param \TYPO3\CMS\Extbase\DomainObject\AbstractEntity $entity
     * @param array $settings
     */
    public function process(&$entity, $settings = array()) {
        if ($this->currentPage && $entity instanceof \Portrino\PxSemantic\SchemaOrg\CreativeWork) {
                // set the name to the page title
            $entity->setName($this->currentPage->getTitle());

                // set the datePublished to the starttime if set, if not take the crDate
            $datePublished = $this->currentPage->getStarttime() ? $this->currentPage->getStarttime() : $this->currentPage->getCrdate();
            $entity->setDatePublished($datePublished);

                // set the dateModified to the tstamp of the page
            $dataModified = $this->currentPage->getTstamp();
            $entity->setDateModified($dataModified);

                // set the description to the abstract of the page
            $entity->setDescription($this->currentPage->getAbstract());

                // set the author to the author of the page
            /** @var \Portrino\PxSemantic\SchemaOrg\Person $author */
            $author = $this->objectManager->get('Portrino\\PxSemantic\\SchemaOrg\\Person');
            $author->setName($this->currentPage->getAuthor());
            $entity->setAuthor($author);

                // set the image to the first image into resources/media list of the page
            $media = $this->currentPage->getMedia();
            if ($media->count() > 0) {
                /** @var \TYPO3\CMS\Extbase\Domain\Model\FileReference $image */
                $image = $media->toArray()[0];
                if ($image->getOriginalResource()->getType() === \TYPO3\CMS\Core\Resource\AbstractFile::FILETYPE_IMAGE) {
                    $image = $this->imageService->getImage('', $image, TRUE);

                    $width = $settings['media']['width'] ? (int)$settings['media']['width'] : 696;
                    $height = $settings['media']['height'] ? (int)$settings['media']['height'] : 'auto';

                    $processingInstructions = array(
                        'width' => $width,
                        'height' => $height,
                    );

                    $processedImage = $this->imageService->applyProcessingInstructions($image, $processingInstructions);

                    if ($processedImage) {
                        /** @var \Portrino\PxSemantic\SchemaOrg\ImageObject $imageObject */
                        $imageObject = $this->objectManager->get('Portrino\\PxSemantic\\SchemaOrg\\ImageObject');

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