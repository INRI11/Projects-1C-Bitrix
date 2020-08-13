<?

//const
if(file_exists($_SERVER["DOCUMENT_ROOT"].'/local/php_interface/app/define.php'))
    require_once 'app/define.php';

//tools
if(file_exists($_SERVER["DOCUMENT_ROOT"].'/local/php_interface/app/tools.php'))
    require_once 'app/tools.php';

//func
if(file_exists($_SERVER["DOCUMENT_ROOT"].'/local/php_interface/app/functions.php'))
    require_once 'app/functions.php';

//events
if(file_exists($_SERVER["DOCUMENT_ROOT"].'/local/php_interface/app/events.php'))
    require_once 'app/events.php';
?>