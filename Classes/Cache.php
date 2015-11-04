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

use Heise\Shariff\CacheInterface;
use TYPO3\CMS\Core\Cache\Frontend\StringFrontend;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class Cache implements CacheInterface
{

    /**
     * @var int Cache timeout
     */
    protected $ttl = 60;

    /**
     * @var StringFrontend
     */
    protected $cache;

    public function __construct(array $configuration)
    {
        if (isset($configuration['ttl'])) {
            $this->ttl = (int)$configuration['ttl'];
        }
        $this->cache = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Cache\\CacheManager')->getCache('rx_shariff');
    }

    /**
     * Set cache entry
     *
     * @param string $key
     * @param string $content
     * @return void
     */
    public function setItem($key, $content)
    {
        $this->cache->set($key, $content, [], $this->ttl);
    }

    /**
     * Get cache entry
     *
     * @param string $key
     * @return string
     */
    public function getItem($key)
    {
        return $this->cache->get($key);
    }

    /**
     * Check if cache entry exists
     *
     * @param string $key
     * @return bool
     */
    public function hasItem($key)
    {
        return $this->cache->has($key);
    }
}
