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

namespace Reelworx\RxShariff;

require_once __DIR__ . '/../Resources/Private/Shariff/vendor/autoload.php';

use Heise\Shariff\Backend;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Shariff Backend implementation
 *
 * @author Markus Klein
 */
class Shariff {

	public function render() {
		$extensionConfiguration = array(
			'services' => 'GooglePlus,Twitter,Facebook,LinkedIn,Reddit,StumbleUpon,Flattr,Pinterest,Xing',
			'facebook_app_id' => '',
			'facebook_secret' => ''
		);
		$userExtensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['rx_shariff']);
		if (is_array($userExtensionConfiguration)) {
			$extensionConfiguration = array_replace($extensionConfiguration, $userExtensionConfiguration);
		}

		$configuration = array(
			'services' => GeneralUtility::trimExplode(',', $extensionConfiguration['services']),
			'cacheClass' => 'Reelworx\\RxShariff\\Cache',
			'cache' => [
				'ttl' => (int)$extensionConfiguration['ttl']
			]
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
