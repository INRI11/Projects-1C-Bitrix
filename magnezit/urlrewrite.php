<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/dictionary/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/dictionary/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/sections/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/sections/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/3d-atlas/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/3d-atlas/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/index.php',
    'SORT' => 100,
  ),
);
