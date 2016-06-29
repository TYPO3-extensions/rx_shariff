.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


What does it do?
================

This extension provides a ready-to-use integration of the social media buttons of Heise Shariff.
The focus of these buttons is to provide more privacy for the website visitor.

.. image:: shariff.jpg
	:width: 400px
	:alt: Shariff Screenshot

More information about Shariff in general can be found here: https://github.com/heiseonline/shariff


Provided components
-------------------

This extension ships the frontend part of Shariff, which comprises the CSS and JS to render the buttons, as well
as the backend part, which allows to fetch the current stats of a social media provider (like count).

For easy integration a Fluid viewhelper is provided, which makes integration into Fluid templates a piece of cake.
Editors can use the provided plugin, to conveniently place the social media buttons on page.

Technically, the backend part is implemented by using a TYPO3 eID script, whose data is loaded by a JS AJAX request
of the frontend part. The retrieved count values are stored in the TYPO3 cache.

The extension is based on shariff (version 1.24.0) and shariff-backend-php (version 5.2.3).
