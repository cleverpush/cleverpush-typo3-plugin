<?php

defined('TYPO3_MODE') or die();

// Add static typoscript configurations
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('cleverpush', 'Configuration/TypoScript/', 'CleverPush');
