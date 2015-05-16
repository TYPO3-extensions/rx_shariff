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


JavaScript and CSS integration
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

The extension also ships the Frontend Javascript and default styles of Shariff.
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

	You need to include the Javascript in your page template, otherwise the usages described below will not work.


Frontend usage
--------------

The extension provides multiple ways to use Shariff in frontend.


Pure TypoScript
^^^^^^^^^^^^^^^

For TypoScript usage, the extension provides a default typolink setup to generate the necessary backend-url.
The setup can be used like this:

.. code-block:: typoscript

	lib.shariffBackendUrl < plugin.rx_shariff.data-backend-url


Fluid viewhelper
^^^^^^^^^^^^^^^^

Additionally the extension provides a Fluid viewhelper to easily integrate Shariff into your HTML template.

.. code-block:: html

	{namespace rx=Reelworx\RxShariff\ViewHelper}
	<rx:shariff data="{url: 'http://example.com/'}" services="whatsapp,facebook" enableBackend="true" />

**Optionally you can define all data attributes available for Shariff.**

Example usages can be found here: http://heiseonline.github.io/shariff/


Frontend plugin
^^^^^^^^^^^^^^^

Simply add a new content element to a page and select the "Shariff Social Icons" plugin.
Adjust the configuration as needed.


Nice to know
------------


News integration
^^^^^^^^^^^^^^^^

You can also easily use this extension within your News extension template.
Simply paste the viewhelper into your ``Detail.html`` template, include one of the static templates and you are ready to go.
