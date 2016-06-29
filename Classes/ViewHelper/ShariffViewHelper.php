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

namespace Reelworx\RxShariff\ViewHelper;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * Class ShariffViewHelper
 *
 * @author Markus Klein <markus.klein@reelworx.at>
 */
class ShariffViewHelper extends AbstractTagBasedViewHelper
{

    /**
     * @throws \TYPO3\CMS\Fluid\Core\ViewHelper\Exception
     */
    public function __construct()
    {
        parent::__construct();

        if (VersionNumberUtility::convertVersionNumberToInteger(TYPO3_branch) < VersionNumberUtility::convertVersionNumberToInteger('7.1')) {
            $this->registerArgument(
                'data',
                'array',
                'Additional data-* attributes. They will each be added with a "data-" prefix.',
                false
            );
        }
    }

    /**
     * Initialize arguments.
     *
     * @return void
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerUniversalTagAttributes();
        $this->registerArgument('services', 'string', 'Comma separated list of services', false);
        $this->registerArgument('enableBackend', 'boolean', 'Enable the Shariff Backend module and show stats', false, false);
    }

    /**
     * Add data attribute handling for CMS 6.2
     */
    public function initialize()
    {
        parent::initialize();

        if (VersionNumberUtility::convertVersionNumberToInteger(TYPO3_branch) < VersionNumberUtility::convertVersionNumberToInteger('7.1')
            && $this->hasArgument('data') && is_array($this->arguments['data'])
        ) {
            foreach ($this->arguments['data'] as $dataAttributeKey => $dataAttributeValue) {
                $this->tag->addAttribute('data-' . $dataAttributeKey, $dataAttributeValue);
            }
        }
    }

    /**
     * @return string
     */
    public function render()
    {
        if ($this->arguments['enableBackend']) {
            $url = $this->controllerContext->getUriBuilder()->reset()->setUseCacheHash(false)
                                           ->setArguments(['eID' => 'shariff'])->buildFrontendUri();
            $this->tag->addAttribute('data-backend-url', $url);
        }

        $services = $this->arguments['services'];
        if ($services !== null) {
            $this->tag->addAttribute(
                'data-services',
                '["' . implode('","', GeneralUtility::trimExplode(',', $services)) . '"]'
            );
        }

        /** @var TypoScriptFrontendController $tsfe */
        $tsfe = $GLOBALS['TSFE'];
        if (!$this->tag->hasAttribute('data-lang') && !empty($tsfe->sys_language_isocode)) {
            $this->tag->addAttribute('data-lang', $tsfe->sys_language_isocode);
        }

        $this->tag->addAttribute('class', 'shariff');
        $this->tag->forceClosingTag(true);
        return $this->tag->render();
    }
}
