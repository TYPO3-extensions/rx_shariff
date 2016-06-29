.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


Change Log
==========

Version 7.2.0
-------------

* Updated shariff to version 1.24.0
* Shariff-backend errors are logged to the default TYPO3 log file (typo3temp/(var/)logs/typo3_*.log)


Version 7.1.1
-------------

* Bugfix: Shariff backend can be disabled again when using the viewhelper


Version 7.1.0
-------------

* Allow the usage of universal tag attributes on the view helper


Version 7.0.2
-------------

* Update shariff-backend to version 5.2.3


Version 7.0.1
-------------

* Fix "allowedDomains" setting not shown in EM


Version 7.0.0
-------------

* BREAKING: All URLs are now checked against the "allowedDomains" setting of the extension.
  By default this the local server name only. If your run more domains you need configure this setting accordingly.
* Update shariff-backend to version 5.1.0


Version 6.0.0
-------------

* Updated shariff-backend to version 5.0.0
* Attention: PHP support is now 5.5 - 7.0


Version 5.2.0
-------------

* Updated shariff to version 1.23.0


Version 5.1.1
-------------

* Fix URL encoding of Facebook again


Version 5.1.0
-------------

* Updated shariff to version 1.22.0
* Updated to shariff-backend version 3.0.1
* Fix URL encoding issues for some stat providers


Version 5.0.2
-------------

* Fix PHP syntax error in PHP <= 5.4


Version 5.0.1
-------------

* Fix various issues with FlexForms


Version 5.0.0
-------------

* Updated to shariff-backend version 2.0.0
* Removed Twitter support for backend due to termination of the API by Twitter.


Version 4.1.0
-------------

* Updated shariff to version 1.21.0
* PSR-7 compliant eID handling for CMS 7


Version 4.0.0
-------------

* Breaking: Stylesheets have been moved to new Public/Css directory
* Updated shariff to version 1.20.0
* Updated shariff-php to version 1.6.0


Version 3.0.0
-------------

* Breaking: Javascript is included as normal footer JS and not as footer lib
* Updated shariff to version 1.18.0


Version 2.4.0
-------------

* Updated shariff to version 1.17.1


Version 2.3.0
-------------

* Declare compatibility with CMS 7.4
* Add composer.json
* Updated shariff to version 1.16.0


Version 2.2.0
-------------

* Updated shariff to version 1.15.0


Version 2.1.0
-------------

* Regression fix: Use guzzle 5.3 (6.0 slipped in by accident)
* Updated shariff to version 1.14.0


Version 2.0.0
-------------

* Update shariff backend to version 1.5.0
* Use native TYPO3 caching framework instead of bundled one
* Add Frontend plugin with FlexForms configuration


Version 1.8.0
-------------

* Added static TypoScript templates
* New "services" attribute for the viewhelper to ease syntax


Version 1.7.0
-------------

* Update shariff JS to version 1.13.0


Version 1.6.0
-------------

* Update shariff JS to version 1.12.0


Version 1.5.1
-------------

* Removes wrong information from the documentation


Version 1.5
-----------

* Update shariff JS to version 1.11.0
* Improved documentation
* TYPO3 CMS 7.2 support


Version 1.4
-----------

* Update shariff JS to version 1.10.0


Version 1.3
-----------

* Update shariff JS to version 1.9.3


Version 1.2
-----------

* Update shariff JS to version 1.8.0


Version 1.1
-----------

* Important bugfix for viewhelper
* Update shariff JS to version 1.7.4 (fixes IE problems)


Version 1.0
-----------

Initial release
