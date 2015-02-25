<?php

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Heise Shariff Backend Module',
	'description' => 'Shariff Backend implementation for TYPO3 CMS. Based on https://github.com/heiseonline/shariff-backend-php, Version 1.2.0',
	'category' => 'plugin',
	'version' => '1.0.0',
	'state' => 'beta',
	'uploadfolder' => 0,
	'author' => 'Markus Klein',
	'author_email' => 'support@reelworx.at',
	'author_company' => 'Reelworx GmbH',
	'constraints' => array (
		'depends' => array (
			'typo3' => '6.2.10-7.1.99',
		),
		'conflicts' => array (
		),
		'suggests' => array (
		),
	),
);
