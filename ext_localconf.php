<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

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
