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
        'StructuredDataApi',
        [
            'Rest' => 'index',
            'Context' => 'index',
            'Vocabulary' => 'index'
        ],
        // non-cacheable actions
        [
            'Rest' => 'index',
        ]
    );
};

$boot($_EXTKEY);
unset($boot);


