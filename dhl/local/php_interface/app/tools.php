<?php

class Tools {

    static $siteInfo;

    public static function getResizedPicture($arImage, $width, $height = 0, $proportional = true) {
        if ($width > 0 && (intval($arImage) > 0 || is_array($arImage))) {
            if ($height <= 0) {
                $height = $width;
            }
            if ($proportional)
                $mode         = BX_RESIZE_IMAGE_PROPORTIONAL;
            else
                $mode         = BX_RESIZE_IMAGE_EXACT;
            $resizedImage = CFile::ResizeImageGet($arImage, array(
                "width"  => $width,
                "height" => $height
            ), $mode, true);
            return array('SRC' => $resizedImage['src'], 'WIDTH' => $resizedImage['width'], 'HEIGHT' => $resizedImage['height'], 'ALT' => $arImage['ALT'], 'TITLE' => $arImage['TITLE']);
        }
        return false;
    }

    public static function show404() {
        global $APPLICATION;
        @define("ERROR_404", "Y");
        CHTTP::SetStatus("404 Not Found");
        $APPLICATION->RestartBuffer();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
        require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
        die();
    }

    public static function ajaxIncModule($module) {
        if (!\Bitrix\Main\Loader::includeModule($module)) {
            $answer['log'] = 'module ' . $module . ' not found';
            print(json_encode($answer));
            die();
        }
    }

    public static function showTemplateJs($arJs) {
        global $APPLICATION;
        foreach ($arJs as $item) {
            $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/' . $item);
        }
    }

    public static function showTemplateCss($arJs) {
        global $APPLICATION;
        foreach ($arJs as $item) {
            $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/' . $item);
        }
    }

    // для отладки (не раз пригодится)
    // записывает все что передадут в /bitrix/log.txt
    public static function log_array() {
        $arArgs  = func_get_args();
        $sResult = '';
        foreach ($arArgs as $arArg) {
            $sResult .= "\n\n" . print_r($arArg, true);
        }

        if (!defined('LOG_FILENAME')) {
            define('LOG_FILENAME', $_SERVER['DOCUMENT_ROOT'] . '/log.txt');
        }
        AddMessage2Log($sResult, 'log_array -> ');
    }

    // проверка на главную страницу
    public static function isMainPage() {
        global $APPLICATION;

        return $APPLICATION->GetCurPage(true) == SITE_DIR . $lang . "index.php";
    }

    // страница личного кабинета
    public static function isPersonalPage() {
        global $APPLICATION;
        return stripos($APPLICATION->GetCurDir(), '/personal/') !== false;
    }

    public static function showBodyClass() {
        global $APPLICATION;
        $APPLICATION->AddBufferContent("Tools::bodyClass");
    }

    public static function bodyClass() {
        global $APPLICATION;
        return $APPLICATION->GetPageProperty('bodyclass');
    }

    public static function showPageHeader() {
        global $APPLICATION;
        $APPLICATION->AddBufferContent("Tools::pageHeader");
    }

    public static function pageHeader() {
        global $APPLICATION;
        $propHeader = $APPLICATION->GetPageProperty('pageheader');
        if (empty($propHeader)) {
            $propHeader = $APPLICATION->GetTitle();
        }

        return $propHeader;
    }

    public static function getSiteName() {
        $siteInfo = array();
        if (empty(self::$siteInfo)) {
            self::$siteInfo = CSite::GetByID(SITE_ID)->arResult[0];
            $siteInfo       = self::$siteInfo;
        } else {
            $siteInfo = self::$siteInfo;
        }
        return $siteInfo['SITE_NAME'];
    }

    // возвращает укороченный текст и его продолжение, делит по словам
    public static function ShortText($inText, $len, $endStr = ' ...') {
        if (strlen($inText) > 0) {
            if (strlen($inText) > $len) {
                $end_pos = $len;
                while (substr($inText, $end_pos, 1) != " " && $end_pos < strlen($inText)) {
                    $end_pos++;
                }
                if ($end_pos < strlen($inText)) {
                    $t1 = substr($inText, 0, $end_pos) . $endStr;
                    $t2 = substr($inText, $end_pos);
                } else {
                    $t1 = $inText;
                }
            } else {
                $t1 = $inText;
            }
        } else {
            $t1 = $inText;
        }
        return array($t1, $t2);
    }

    public static function toWin($str) {
        return iconv('utf-8', 'windows-1251', $str);
    }

    public static function toUTF8($str) {
        return iconv('windows-1251', 'utf-8', $str);
    }

    /**
     * @param string $filename [no .php]
     * @param array $params
     */
    public static function includeFile($filename, $params = array()) {
        global $APPLICATION;

        $lang = Pages::get_lang();

        $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            array_merge(
                $params,
                array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_TEMPLATE_PATH . "/include/{$lang}/" . $filename . ".php",
                    'COMPOSITE_FRAME_TYPE' => 'AUTO',
                    'COMPONENT_TEMPLATE' => '.default',
                    'COMPOSITE_FRAME_MODE' => 'A',
                )
            ),
            false

        );
    }

    /**
     * Есть еще getCorrectPluralForm
     * @param int $value
     * @param array $titles array('комментарий', 'комментария', 'комментариев')
     * @param bool $onlyWord Вернуть только слово
     * @return string  Число и Правильная форма слова
     */
    public static function humanPluralForm($value, $titles = array('комментарий', 'комментария', 'комментариев'), $onlyWord = false) {
        $number = (int) $value;
        $result = '';
        $cases  = array(2, 0, 1, 1, 1, 2);
        $word   = $titles[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];
        if ($onlyWord) {
            $result = $word;
        } else {
            $result = $number . " " . $word;
        }
        return $result;
    }

    /**
     * Есть еще humanPluralForm
     * @param int $n Кол-во
     * @param array $variantList array('объект', 'объекта', 'объектов')
     * @return string Корректная форма 'товар', 'товара', 'товаров'
     */
    public static function getCorrectPluralForm($n, $variantList = array('объект', 'объекта', 'объектов')) {
        return $n % 10 == 1 && $n % 100 != 11 ? $variantList[0] : ($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 || $n % 100 >= 20) ? $variantList[1] : $variantList[2]);
    }

    public static function cleanDirtyKeys($arr) {
        if (is_array($arr)) {
            foreach ($arr as $key => $val) {
                if (substr($key, 0, 1) == '~') {
                    unset($arr[$key]);
                }
            }
        }
        return $arr;
    }

    public static function dd($var, $file = false) {
        if ($file) {
            $f = fopen($_SERVER["DOCUMENT_ROOT"] . "/out.txt", "at+");
            ob_start();
            echo "======\n\r";

            var_dump($var);

            $text = ob_get_clean();
            fwrite($f, $text);
            fclose($f);
        } else {
            echo "<pre>";
            var_dump($var);
            echo "</pre>";
        }
    }

    public static function is404() {
        return defined('ERROR_404');
    }


    public static function outJson($response) {
        ob_end_clean();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($response);
        exit;
    }

    /**
     * Обрабатывает переданное значение: обрабатывает его FILTER_SANITIZE_NUMBER_INT + если надо форматирует
     * @param int $value
     * @param bool $format
     * @return string
     */
    public static function preparePrice($value, $format = false) {
        $clean = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
        if ($format) {
            $clean = number_format((float) $clean, 0, ',', ' ');
        }
        return $clean;
    }

    /**
     * Оборачивает строку в тег, если надо. Еще может и класс добавить
     * @param string $value
     * @param string $tag По умолчанию P
     * @param string $className
     * @return string
     */
    public static function wrapIntoTag($value, $tag = 'p', $className = '') {
        $wrapped = '';
        if (!empty($value)) {
            if (!empty($className)) {
                $class = " class='{$className}'";
            }
            $wrapped = strstr($value, "<{$tag}>") ? $value : "<{$tag}{$class}>{$value}</{$tag}>";
        }
        return $wrapped;
    }

}
