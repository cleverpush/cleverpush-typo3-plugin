<?php

defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'FE') {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess'][] =
            \CleverPush\Hooks\PageRenderer::class . '->renderPreProcess';
}
