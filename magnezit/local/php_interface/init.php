<?php

use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;

CModule::IncludeModule("iblock");
CModule::IncludeModule("highloadblock");

define('BX_LOCAL_ROOT', realpath(dirname(__FILE__)."/.."));

Loader::registerAutoLoadClasses(null,
    [
        '\Magnezit\Helpers\File\Asset'              => '/local/php_interface/classes/Helpers/File/Asset.php',
        '\Magnezit\Helpers\Server\Helper'           => '/local/php_interface/classes/Helpers/Server/Helper.php',
        '\Magnezit\Finders\AbstractFinder'          => '/local/php_interface/classes/Finders/AbstractFinder.php',
        '\Magnezit\Finders\Iblock'                  => '/local/php_interface/classes/Finders/Iblock.php',
        '\Magnezit\Finders\IBlockFinder'            => '/local/php_interface/classes/Finders/IBlockFinder.php',
        '\Magnezit\Finders\IblockProperty'          => '/local/php_interface/classes/Finders/IblockProperty.php',
        '\Magnezit\Finders\IblockPropertyFinder'    => '/local/php_interface/classes/Finders/IblockPropertyFinder.php',
    ]
);