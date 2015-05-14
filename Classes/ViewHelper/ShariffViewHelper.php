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
	 * @param string $services comma separated list of services
	 * @return string
	 */
	public function render($services = NULL) {
		$url = $this->controllerContext->getUriBuilder()->reset()->setUseCacheHash(FALSE)->setArguments(array('eID' => 'shariff'))->buildFrontendUri();
		$this->tag->addAttribute('data-backend-url', $url);
		$this->tag->addAttribute('class', 'shariff');

		if ($services !== NULL) {
			$this->tag->addAttribute('data-services', '["' . implode('","', GeneralUtility::trimExplode(',', $services)) . '"]');
		}
		$this->tag->forceClosingTag(TRUE);
		return $this->tag->render();
	}
}