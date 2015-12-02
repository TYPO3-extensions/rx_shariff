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

namespace Reelworx\RxShariff\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class ShariffController
 *
 * @author Frank Nägler <typo3@naegler.net>
 */
class ShariffController extends ActionController
{

    /**
     * Render content element
     *
     * This action renders the content element in Frontend
     * based on the TypoScript settings and overwritten by
     * the settings from FlexForms.
     *
     * @return void
     */
    public function indexAction()
    {
        $data = $this->settings['data'];
        unset($data['services']);
        foreach ($data as $key => $value) {
            if (trim($value) === '') {
                unset($data[$key]);
            }
        }

        $this->view->assign('data', $data);
        $this->view->assign('enableBackend', $this->settings['enableBackend']);
        $this->view->assign('services', $this->settings['data']['services']);
    }
}
