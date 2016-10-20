<?php
defined('TYPO3_MODE') || die();

$boot = function ($_EXTKEY) {

    /** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
    $signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);


    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Portrino.' . $_EXTKEY,
        'StructuredDataMarkup',
        [
            'Entity' => 'render'
        ],
        // non-cacheable actions
        []
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Portrino.' . $_EXTKEY,
        'HydraApi',
        [
            'Api' => 'index',
        ],
        // non-cacheable actions
        [
            'Api' => 'index',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Portrino.' . $_EXTKEY,
        'HydraContext',
        [
            'Context' => 'index'
        ],
        // non-cacheable actions
        []
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Portrino.' . $_EXTKEY,
        'HydraVocabulary',
        [
            'Vocabulary' => 'index'
        ],
        // non-cacheable actions
        []
    );

    if (TYPO3_MODE === 'FE') {
        $signalSlotDispatcher->connect(
            \TYPO3\CMS\Extbase\Mvc\Dispatcher::class,
            'afterRequestDispatch',
            \Portrino\PxSemantic\Aspect\CachingAspect::class,
            'setCacheEntryForActionMethodResponse'
        );

        $signalSlotDispatcher->connect(
            \TYPO3\CMS\Extbase\Mvc\Controller\ActionController::class,
            'beforeCallActionMethod',
            \Portrino\PxSemantic\Aspect\CachingAspect::class,
            'getCacheEntryForActionMethodResponse'
        );
    }
};

$boot($_EXTKEY);
unset($boot);


