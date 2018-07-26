INTRODUCTION
------------

The Analytics With Auth0 module allows developers to declare custom Google Analytic events tracking while passing a custom dimension of the Auth0's User ID. 

* For a full description of the module, visit the project page:
  https://drupal.org/project/analytics_auth0

* To submit bug reports and feature suggestions, or to track changes:
  https://drupal.org/project/issues/analytics_auth0

REQUIREMENTS
------------

This module requires the following module:

* Auth0 (https://www.drupal.org/project/auth0 or https://github.com/auth0/auth0-drupal)

INSTALLATION
------------
 
* Install as you would normally install a contributed Drupal module. Visit:
  https://www.drupal.org/docs/8/extending-drupal-8/installing-drupal-8-modules
  for further information.

CONFIGURATION
-------------

* Plug your Google Web Property ID into the following code and 
  place in your theme's html.html.twig above the closing body tag:

  <!-- Google Analytics -->
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-34092501-10"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'WEB_PROPERTY_ID');
  </script>

* Set up a custom dimension for an Auth0 user in your Google Analytics account
  following these instructions:
  https://support.google.com/analytics/answer/2709829#set_up_custom_dimensions

* Add custom event tracking in js/ga_analytics.js using the following syntax:
  attach([element], [category], [label], [action (optional)]);

TROUBLESHOOTING
---------------

* After enabling the module, you may need to clear all Drupal caches and
  your browser cache.

MAINTAINERS
-----------

Current maintainers:
 * Beverly Lanning (bemarlan) - https://www.drupal.org/user/3513747