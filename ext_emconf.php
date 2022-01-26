<?php

########################################################################
# Extension Manager/Repository config file for ext "cleverpush".
#
# Auto generated 06-02-2017 20:00
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'CleverPush',
	'description' => 'Includes the CleverPush Opt-In code on your website.',
	'category' => 'fe',
	'version' => '1.0.1',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => '',
    'clearcacheonload' => TRUE,
	'lockType' => '',
	'author' => 'CleverPush Team',
	'author_email' => 'support@cleverpush.com',
	'author_company' => 'CleverPush GmbH',
	'constraints' =>
    [
        'depends' => [
            'typo3' => '6.2.0-11.1.1',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
);

?>

