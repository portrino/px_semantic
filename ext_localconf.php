<?php
defined('TYPO3_MODE') || die();

$boot = function ($_EXTKEY) {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Portrino.' . $_EXTKEY,
        'StructuredDataMarkup',
        array(
            'Entity' => 'render'
        ),
        // non-cacheable actions
        array(
        )
    );
};

$boot($_EXTKEY);
unset($boot);


