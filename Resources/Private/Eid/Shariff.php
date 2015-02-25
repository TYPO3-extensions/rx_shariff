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
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class Shariff {

	public function render() {
		$extensionConfiguration = array(
			'services' => 'GooglePlus,Twitter,Facebook,LinkedIn,Reddit,StumbleUpon,Flattr,Pinterest,Xing',
			'ttl' => 60,
			'facebook_app_id' => '',
			'facebook_secret' => ''
		);
		$userExtensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['rx_shariff']);
		if (is_array($userExtensionConfiguration)) {
			$extensionConfiguration = array_replace($extensionConfiguration, $userExtensionConfiguration);
		}

		$configuration = array(
			'services' => GeneralUtility::trimExplode(',', $extensionConfiguration['services']),
			'cache' => array(
				'ttl' => (int)$extensionConfiguration['ttl'],
				'cacheDir' => PATH_site . 'typo3temp',
			),
		);

		if (in_array('Facebook', $configuration['services'], TRUE)) {
			$configuration['Facebook'] = array(
				'app_id' => $extensionConfiguration['facebook_app_id'],
				'secret' => $extensionConfiguration['facebook_secret'],
			);
		}

		$url = !empty($_GET['url']) ? $_GET['url'] : (string)$_SERVER['HTTP_REFERER'];

		$shariff = new Backend($configuration);
		$result = $shariff->get($url);

		header('Content-type: application/json');
		echo json_encode($result);
	}
}

$backend = new Shariff();
$backend->render();
