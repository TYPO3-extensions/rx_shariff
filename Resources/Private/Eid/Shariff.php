<?php
/*
 *
 * This file is part of the rx_shariff Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * Copyright (c) Reelworx GmbH
 *
 */

namespace Reelworx\ShariffBackend\Shariff;

require_once __DIR__ . '/../Shariff/vendor/autoload.php';

use Heise\Shariff\Backend;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class Shariff {

	public function render() {
		header('Content-type: application/json');

		$extensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['rx_shariff']);
		if (!is_array($extensionConfiguration)) {
			$extensionConfiguration = array('configurationFile' => 'EXT:rx_shariff/Configuration/shariff.json');
		}
		$configurationFilePath = GeneralUtility::getFileAbsFileName($extensionConfiguration['configurationFile']);
		$configurationFileContent = GeneralUtility::getUrl($configurationFilePath);
		$configuration = json_decode($configurationFileContent, TRUE);
		$shariff = new Backend($configuration);

		$url = !empty($_GET['url']) ? $_GET['url'] : (string)$_SERVER['HTTP_REFERER'];
		$result = $shariff->get($url);
var_dump($result);
		echo json_encode($result);
	}
}

$backend = new Shariff();
$backend->render();
