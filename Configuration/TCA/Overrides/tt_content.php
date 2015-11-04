<?php

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Reelworx.RxShariff',
    'Shariff',
    'LLL:EXT:rx_shariff/Resources/Private/Language/locallang_be.xlf:plugin_title',
    'EXT:rx_shariff/Resources/Public/Icons/plugin.png'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['rxshariff_shariff'] = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['rxshariff_shariff'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'rxshariff_shariff',
    'FILE:EXT:rx_shariff/Configuration/FlexForms/flexform_shariff.xml'
);
