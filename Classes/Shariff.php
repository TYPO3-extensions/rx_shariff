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
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Shariff Backend implementation
 *
 * @author Markus Klein
 */
class Shariff
{
    /**
     * Process request
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return null|ResponseInterface
     */
    public function processRequest(ServerRequestInterface $request, ResponseInterface $response)
    {
        $url = !empty($request->getQueryParams()['url'])
            ? $request->getQueryParams()['url']
            : (string)$_SERVER['HTTP_REFERER'];

        $response = $response->withHeader('Content-type', 'application/json');
        $response->getBody()->write(json_encode($this->render($url)));
        return $response;
    }

    /**
     * Legacy request handling with direct access to GET parameters
     */
    public function processRequestLegacy() {
        $url = !empty($_GET['url']) ? $_GET['url'] : (string)$_SERVER['HTTP_REFERER'];

        header('Content-type: application/json');
        echo json_encode($this->render($url));
    }

    /**
     * Retrieve the stats from the services
     *
     * @param string $url URL for which stats should be queried
     * @return array Array of results
     */
    protected function render($url)
    {
        $extensionConfiguration = array(
            'services' => 'GooglePlus, Facebook, LinkedIn, Reddit, StumbleUpon, Flattr, Pinterest, Xing, AddThis',
            'facebook_app_id' => '',
            'facebook_secret' => '',
        );
        $userExtensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['rx_shariff']);
        if (is_array($userExtensionConfiguration)) {
            $extensionConfiguration = array_replace($extensionConfiguration, $userExtensionConfiguration);
        }

        $serviceArray = GeneralUtility::trimExplode(',', $extensionConfiguration['services']);
        // filter Twitter, which has been removed
        $serviceArray = array_filter($serviceArray, function ($value) {
            return strtolower($value) !== 'twitter';
        });

        $configuration = array(
            'services' => $serviceArray,
            'cacheClass' => 'Reelworx\\RxShariff\\Cache',
            'cache' => [
                'ttl' => (int)$extensionConfiguration['ttl'],
            ],
        );

        if (in_array('Facebook', $configuration['services'], true)) {
            $configuration['Facebook'] = array(
                'app_id' => $extensionConfiguration['facebook_app_id'],
                'secret' => $extensionConfiguration['facebook_secret'],
            );
        }

        $shariff = new Backend($configuration);
        return $shariff->get($url);
    }
}
