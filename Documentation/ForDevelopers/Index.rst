.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _for-developers:

For Developers
==============

.. _own-processors:

Implement your own processors
'''''''''''''''''''''''''''''

To implement your own processors you just have to implement the ``Portrino\PxSemantic\Processor\ProcessorInterface``.
You will get the entity as call by reference parameter. The type of the entity is defined in TypoScript as described in
the "For Administrator" section.


Example - RatingProcessor
'''''''''''''''''''''''''

This example illustrates how we could implement our own processor to embed structured data with information about the
rating of the current page. We assume that you have installed and configured the `th_rating <typo3.org/extensions/repository/view/th_rating>`_  extension.


PHP:
""""

::

    /**
     * Class RatingProcessor
     *
     * @package Vendor\ExtensionName\Processor
     */
    class RatingProcessor implements \Portrino\PxSemantic\Processor\ProcessorInterface {

        /**
         * @var \Vendor\ExtensionName\Domain\Model\Page
         */
        protected $currentPage;

        /**
         * @var int
         */
        protected $currentPageUid;

        /**
         * @var \Vendor\ExtensionName\Domain\Repository\PageRepository
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
         * @var \Thucke\ThRating\Domain\Repository\RatingobjectRepository
         * @inject
         */
        protected $ratingobjectRepository;

        /**
         * @var \Thucke\ThRating\Domain\Repository\RatingRepository
         * @inject
         */
        protected $ratingRepository;

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
            if ($entity instanceof \Portrino\PxSemantic\SchemaOrg\CreativeWork) {
                if ($this->currentPage) {
                    /** @var \Thucke\ThRating\Domain\Model\Ratingobject $ratingObject */
                    $ratingObject = $this->ratingobjectRepository->findByUid($settings['ratingObjectUid']);

                    if ($ratingObject) {
                        /** @var \Portrino\PxSemantic\SchemaOrg\AggregateRating $aggregateRating */
                        $aggregateRating = $this->objectManager->get('Portrino\\PxSemantic\\SchemaOrg\\AggregateRating');

                        $stepConfs = $ratingObject->getStepconfs();
                        $stepWeights = array();
                        /** @var \Thucke\ThRating\Domain\Model\Stepconf $stepConf */
                        foreach ($stepConfs as $stepConf) {
                            $stepWeights[] = $stepConf->getStepweight();
                        }

                        $worstRating = min($stepWeights);
                        $bestRating = array_sum($stepWeights);

                        $aggregateRating->setWorstRating($worstRating);
                        $aggregateRating->setBestRating($bestRating);

                        /** @var \Thucke\ThRating\Domain\Model\Rating $rating */
                        $rating = $this->ratingRepository->findMatchingObjectAndUid($ratingObject, $this->currentPageUid);

                        if ($rating) {
                            $currentRates = $rating->getCurrentrates();

                            if ($currentRates) {
                                $aggregateRating->setRatingCount($currentRates['numAllVotes']);
                                $aggregateRating->setRatingValue($currentRates['currentrate']);

                                if ((int)$aggregateRating->getRatingCount() > 0 && (int)$aggregateRating->getRatingValue() > 0) {
                                    $entity->setAggregateRating($aggregateRating);
                                }
                            }
                        }
                    }
                }
            }
        }
    }


TypoScript:
"""""""""""

Configure ``structuredDataMarkupRating`` plugin in your TypoScript setup.

::

    lib.structuredDataMarkupRating < lib.structuredDataMarkup
    lib.structuredDataMarkupRating {
        settings {
            entity = Portrino\PxSemantic\SchemaOrg\CreativeWork
            processors {
                # sets the rating specific values
                0 {
                    className = Portrino\SiteAssets\Processor\RatingProcessor
                    settings {
                        ratingObjectUid = 1
                    }
                }
            }
        }
    }


Include plugin somewhere in your document:

::

    page.headerData.1453734423 < lib.structuredDataMarkupRating