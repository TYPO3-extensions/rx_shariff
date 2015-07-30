<?php

$EM_CONF['rx_shariff'] = array (
	'title' => 'Heise Shariff',
	'description' => 'Shariff implementation for TYPO3 CMS including the backend module, a viewhelper and a plugin.',
	'category' => 'plugin',
	'version' => '2.2.0',
	'state' => 'stable',
	'uploadfolder' => FALSE,
	'author' => 'Markus Klein',
	'author_email' => 'support@reelworx.at',
	'author_company' => 'Reelworx GmbH',
	'constraints' => array(
		'depends' => array(
			'php' => '5.4.0-0.0.0',
			'typo3' => '6.2.9-7.4.99',
		),
		'conflicts' => array(),
		'suggests' => array(),
	),
);
