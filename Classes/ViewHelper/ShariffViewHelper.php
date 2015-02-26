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

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

/**
 * Class ShariffViewHelper
 *
 * @author Markus Klein <markus.klein@reelworx.at>
 */
class ShariffViewHelper extends AbstractTagBasedViewHelper {

	/**
	 * @return string
	 */
	public function render() {
		$url = $this->controllerContext->getUriBuilder()->reset()->setUseCacheHash(FALSE)->setArguments(array('eID' => 'shariff'))->buildFrontendUri();
		$this->tag->addAttribute('data-backend-url', $url);
		$this->tag->addAttribute('class', 'shariff');
		return $this->tag->render();
	}
}