.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


What does it do?
================

The extension provides a ready-to-use server module for the Heise Shariff frontend social media integration.
Moreover a viewhelper is provided for simple integration.

Shariff has the possibility to load likes/shares/etc via a server module. This extension provides the server
module as eID script.

More information about Shariff in general can be found here: https://github.com/heiseonline/shariff

The extension is based on shariff(1.7.4) and shariff-backend-php(1.4.1).

Installation
============

Install the extension via Extension Manager as usual.

The provided Javascript requires jQuery to be loaded. You have to take care of this on your own. The example below shows that too.


Configuration
=============

You can configure the extension in the Extension Manager.
It allows to set most of the options as documented here: https://github.com/heiseonline/shariff-backend-php

Frontend usage
==============

The extension provides multiple ways to use Shariff in frontend.

For TypoScript usage, the extension provides a default typolink setup to generate the necessary backend-url.
The setup can be used like this:

.. code-block:: typoscript

	lib.shariffBackendUrl < plugin.rx_shariff.data-backend-url

Additionally the extension provides a Fluid viewhelper to easily integrate Shariff in your HTML template.

.. code-block:: html

	{namespace rx=Reelworx\RxShariff\ViewHelper}
	<rx:shariff />

**Optionally you can define all data attributes available for Shariff.**

For TYPO3 CMS 6.2 use:

.. code-block:: html

	<rx:shariff additionalAttributes="{data-url: 'http://example.com/'}" />

For TYPO3 CMS 7 you may also use the newer syntax:

.. code-block:: html

	<rx:shariff data="{url: 'http://example.com/'}" />


JavaScript and CSS integration
------------------------------

The extension also ships the frontend Javscript and default styles.

You can simply integrate them in your page template:

.. code-block:: typoscript

	page = PAGE

	page.javascriptLibs.jQuery = 1
	page.javascriptLibs.jQuery.version = latest
	page.javascriptLibs.jQuery.source = local

	page.includeJSFooterlibs.shariff = EXT:rx_shariff/Resources/Public/JavaScript/shariff.min.js
	page.includeCSS.shariff = EXT:rx_shariff/Resources/Public/Stylesheet/shariff.min.css
	# or you may use
	# page.includeCSS.shariff = EXT:rx_shariff/Resources/Public/Stylesheet/shariff.complete.css

.. important::

	You need to include the Javascript in your page template. The viewhelper alone only renders the required <div> tag.
	The Javascript is responsible for doing the rest.

Nice to know
============

News integration
^^^^^^^^^^^^^^^^

You can also easily use this extension within your News extension template.
Simply paste the viewhelper in your Detail.html template and add the TypoScript to include the Shariff Javascript library
and you are ready to go.

Known issues
============

None, at the moment.

Bug reports
===========

Issue tracker: https://forge.typo3.org/projects/extension-rx_shariff

Contributions
=============

Contributions and ideas are very welcome.

Git repository: https://git.typo3.org/TYPO3CMS/Extensions/rx_shariff.git

The contribution workflow follows the Core rules and therefore uses Gerrit: https://review.typo3.org/

To clone your copy consider using the awesome Gerrit-Git-Helper: http://www.wwwision.de/githelper/
