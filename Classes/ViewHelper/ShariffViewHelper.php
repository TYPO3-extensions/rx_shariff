<?php
/*
 *
 * This file is part of the COMOT Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * Copyright (c) Reelworx GmbH
 *
 */

namespace Reelworx\RxShariff\ViewHelper;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

/**
 * Class ShariffViewHelper
 *
 * @author Markus Klein <markus.klein@reelworx.at>
 */
class ShariffViewHelper extends AbstractTagBasedViewHelper {

	/**
	 * @throws \TYPO3\CMS\Fluid\Core\ViewHelper\Exception
	 */
	public function __construct() {
		parent::__construct();

		if (!GeneralUtility::compat_version('7.1')) {
			$this->registerArgument('data', 'array', 'Additional data-* attributes. They will each be added with a "data-" prefix.', FALSE);
		}
	}

	/**
	 * Add data attribute handling for CMS 6.2
	 */
	public function initialize() {
		parent::initialize();

		if (!GeneralUtility::compat_version('7.1') && $this->hasArgument('data') && is_array($this->arguments['data'])) {
			foreach ($this->arguments['data'] as $dataAttributeKey => $dataAttributeValue) {
				$this->tag->addAttribute('data-' . $dataAttributeKey, $dataAttributeValue);
			}
		}
	}

	/**
	 * @param string $services comma separated list of services
	 * @param bool $enableBackend
	 * @return string
	 */
	public function render($services = NULL, $enableBackend = TRUE) {
		if ($enableBackend) {
			$url = $this->controllerContext->getUriBuilder()->reset()->setUseCacheHash(FALSE)
				->setArguments(array('eID' => 'shariff'))->buildFrontendUri();
			$this->tag->addAttribute('data-backend-url', $url);
		}

		if ($services !== NULL) {
			$this->tag->addAttribute('data-services', '["' . implode('","', GeneralUtility::trimExplode(',', $services)) . '"]');
		}

		$this->tag->addAttribute('class', 'shariff');
		$this->tag->forceClosingTag(TRUE);
		return $this->tag->render();
	}
}
