<?php
return array (
  'debug' => false,
  'App' => 
  array (
    'namespace' => 'App',
    'encoding' => 'UTF-8',
    'base' => false,
    'dir' => 'src',
    'webroot' => 'public_html',
    'wwwRoot' => '/home/envoynet/public_html/',
    'fullBaseUrl' => 'http://envoynetworks.ca',
    'imageBaseUrl' => 'img/',
    'cssBaseUrl' => 'css/',
    'jsBaseUrl' => 'js/',
    'paths' => 
    array (
      'plugins' => 
      array (
        0 => '/home/envoynet/envoynet/plugins/',
      ),
      'templates' => 
      array (
        0 => '/home/envoynet/envoynet/src/Template/',
      ),
      'locales' => 
      array (
        0 => '/home/envoynet/envoynet/src/Locale/',
      ),
    ),
  ),
  'Security' => 
  array (
  ),
  'Asset' => 
  array (
  ),
  'Error' => 
  array (
    'errorLevel' => 24575,
    'exceptionRenderer' => 'Cake/Error/ExceptionRenderer',
    'skipLog' => 
    array (
    ),
    'log' => true,
    'trace' => true,
  ),
  'Session' => 
  array (
    'defaults' => 'php',
    'ini' => 
    array (
      'session.cookie_secure' => false,
    ),
  ),
  'plugins' => 
  array (
    'Bake' => '/home/envoynet/envoynet/vendor/cakephp/bake/',
    'DebugKit' => '/home/envoynet/envoynet/vendor/cakephp/debug_kit/',
    'Migrations' => '/home/envoynet/envoynet/vendor/cakephp/migrations/',
  ),
);