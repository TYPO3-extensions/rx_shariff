.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


What does it do?
================

The extension provides a ready-to-use backend module for the Heise Shariff frontend social media integration.

Shariff has the possibility to load likes/shares/etc via a server/backend module. This extension provides the backend
module, so you can focus on the frontend integration of the Shariff code.

More information about Shariff in general can be found here: https://github.com/heiseonline/shariff

Installation
============

The installation does not require any special steps. Just install the extension via the Extension Manager.

Configuration
=============

All necessary configuration is accomplished in the extension configuration dialog provided by the Extension Manager.

Frontend usage
==============

The frontend usage is as simple as using the TypoScript provided by the extension within your template.

Your HTML within your Fluid template might contain

.. code-block:: html

	<div class="shariff" data-backend-url="{shariffBackend}"></div>


The TypoScript for this would be

.. code-block:: typoscript

	page = PAGE
	page.10 = FLUIDTEMPLATE
	...
	page.10.variables.shariffBackend < plugin.rx_shariff.data-backend-url

