<?php

namespace CleverPush\Hooks;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Add google-analytics trackingcode
 *
 * @author CleverPush Team <support@cleverpush.com>
 * @package TYPO3
 * @subpackage tx_cleverpush
 */
class PageRenderer
{

    protected $cObjRenderer = NULL;

    /**
     * Insert cleverpush code
     *
     * @param array $params
     * @param \TYPO3\CMS\Core\Page\PageRenderer $pObj
     * @return void
     */
    public function renderPreProcess($params, $pObj)
    {
        if (TYPO3_MODE === 'FE') {
            // Get plugin config
            $conf = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_cleverpush.']['settings.'];
            if (!empty($conf['channelId'])) {
                $scriptTag = '<script src="https://static.cleverpush.com/sdk/cleverpush.js" async></script>' .
                    LF . '<script>' .
                    LF . 'CleverPush = window.CleverPush || [];' .
                    LF . 'CleverPush.push([\'init\', { channelId: \'' . $conf['channelId'] . '\' }]);' .
                    LF . '</script>';
                $pObj->addFooterData($scriptTag);
            } else if (!empty($conf['subdomain'])) {
                // support old code if channelId was not set, yet
                $scriptTag = '<script>' .
                    LF . '(function(c,l,v,r,p,s,h){c[\'CleverPushObject\']=p;c[p]=c[p]||function(){(c[p].q=c[p].q||[]).push(arguments)},c[p].l=1*new Date();s=l.createElement(v),h=l.getElementsByTagName(v)[0];s.async=1;s.src=r;h.parentNode.insertBefore(s,h)})(window,document,\'script\',\'//' . $conf['subdomain'] . '.cleverpush.com/loader.js\',\'cleverpush\');' .
                    LF . 'cleverpush(\'triggerOptIn\');' .
                    LF . 'cleverpush(\'checkNotificationClick\');' .
                    LF . '</script>';
                $pObj->addFooterData($scriptTag);
            }
        }
    }

    /**
     * Render a cObject
     *
     * @param string $name The name of the cobject (COA|TEXT)
     * @param array $conf The configuration array
     * @return string The rendered cObject
     */
    public function getCobject($name, $conf)
    {
        if (is_null($this->cObjRenderer)) {
            $this->cObjRenderer = new ContentObjectRenderer();
        }
        return $this->cObjRenderer->cObjGetSingle($name, $conf);
    }

}
