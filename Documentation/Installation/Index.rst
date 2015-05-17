.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


Installation
============

Install the extension via Extension Manager as usual.

The provided Javascript requires jQuery to be loaded. You have to take care of this on your own. The example below shows that too.


Configuration
-------------

You can configure the extension in the Extension Manager.
It allows to set most of the options for the backend module as documented here: https://github.com/heiseonline/shariff-backend-php


Frontend usage
--------------

The extension provides multiple ways to use Shariff in frontend.

For TypoScript usage, the extension provides a default typolink setup to generate the necessary backend-url.
The setup can be used like this:

.. code-block:: typoscript

	lib.shariffBackendUrl < plugin.rx_shariff.data-backend-url

Additionally the extension provides a Fluid viewhelper to easily integrate Shariff into your HTML template.

.. code-block:: html

	{namespace rx=Reelworx\RxShariff\ViewHelper}
	<rx:shariff />

**Optionally you can define all data attributes available for Shariff.**

Example usages can be found here: http://heiseonline.github.io/shariff/

For TYPO3 CMS 6.2 use:

.. code-block:: html

	<rx:shariff additionalAttributes="{data-url: 'http://example.com/'}" services="whatsapp,facebook" />

For TYPO3 CMS 7 you may also use the newer syntax:

.. code-block:: html

	<rx:shariff data="{url: 'http://example.com/'}" services="whatsapp,facebook" />


**Note:** The special syntax with escaping the inner double quotes is required for Fluid to work.


JavaScript and CSS integration
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

The extension also ships the frontend Javscript and default styles.
You can simple add one of the four available static templates:

* Shariff: Include Shariff and jQuery
* Shariff: Include Shariff, font-awesome and jQuery
* Shariff: Include Shariff without jQuery
* Shariff: Include Shariff, font-awesome without jQuery

If you want, you can also simply integrate them in your own page template:

.. code-block:: typoscript

	page = PAGE

	page.javascriptLibs.jQuery = 1
	page.javascriptLibs.jQuery.version = latest
	page.javascriptLibs.jQuery.source = local

	page.includeJSFooterlibs.shariff = EXT:rx_shariff/Resources/Public/JavaScript/shariff.min.js
	page.includeCSS.shariff = EXT:rx_shariff/Resources/Public/Stylesheet/shariff.min.css
	# or you may use the following for include font-awesome too
	# page.includeCSS.shariff = EXT:rx_shariff/Resources/Public/Stylesheet/shariff.complete.css

.. important::

	You need to include the Javascript in your page template. The viewhelper alone only renders the required <div> tag.
	The Javascript is responsible for doing the rest.


Nice to know
------------


News integration
^^^^^^^^^^^^^^^^

You can also easily use this extension within your News extension template.
Simply paste the viewhelper in your `Detail.html` template and add the TypoScript to include the Shariff Javascript library
and you are ready to go.
