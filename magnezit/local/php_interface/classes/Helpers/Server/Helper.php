<?php

namespace Magnezit\Helpers\Server;

use Bitrix\Main\Context;
use Bitrix\Main\Application;

class Helper
{
    public static function getSiteUrl($isHttps = null)
    {
        if(is_null($isHttps))
        {
            $protocol = (\CMain::IsHTTPS()) ? "https://" : "http://";
        }
        else
        {
            $protocol = $isHttps === true ? "https://" : "http://";
        }

        $sServerName = Context::getCurrent()->getServer()->get("SERVER_NAME");
        $domain = SITE_SERVER_NAME ? SITE_SERVER_NAME : $sServerName;
        return rtrim($protocol.$domain, '/');
    }
}