<?php
defined('TYPO3_MODE') || die();

if (\TYPO3\CMS\Core\Utility\GeneralUtility::compat_version('7.5')) {
    $GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['shariff'] = \Reelworx\RxShariff\Shariff::class . '::processRequest';
} else {
    $GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['shariff'] = 'EXT:rx_shariff/Resources/Private/Eid/Shariff.php';
}

if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['rx_shariff'])) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['rx_shariff'] = [
        'frontend' => \TYPO3\CMS\Core\Cache\Frontend\StringFrontend::class,
        'backend' => \TYPO3\CMS\Core\Cache\Backend\SimpleFileBackend::class,
        'options' => [
            'defaultLifetime' => 3600,
        ],
        'groups' => ['pages', 'all'],
    ];
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Reelworx.RxShariff',
    'Shariff',
    ['Shariff' => 'index'],
    []
);
