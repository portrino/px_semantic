<?php
defined('TYPO3_MODE') || die();

$boot = function ($_EXTKEY) {
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
};

$boot($_EXTKEY);
unset($boot);


