<?php

$EM_CONF['rx_shariff'] = array (
	'title' => 'Heise Shariff',
	'description' => 'Shariff implementation for TYPO3 CMS including the backend module and a viewhelper. Based on shariff(1.7.3), shariff-backend-php(1.4.1)',
	'category' => 'plugin',
	'version' => '1.1.0-dev',
	'state' => 'stable',
	'uploadfolder' => 0,
	'author' => 'Markus Klein',
	'author_email' => 'support@reelworx.at',
	'author_company' => 'Reelworx GmbH',
	'constraints' => array (
		'depends' => array (
			'php' => '5.4.0-0.0.0',
			'typo3' => '6.2.10-7.1.99',
		),
		'conflicts' => array (
		),
		'suggests' => array (
		),
	),
);
