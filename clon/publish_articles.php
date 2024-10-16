<?php
include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');

try {
    $sql = 'UPDATE '._DB_PREFIX_.'dbblog_post
            SET active = 1
            WHERE publish_date <= NOW() AND active = 0';
    Db::getInstance()->execute($sql);

} catch (Exception $e) {
    error_log('Error al ejecutar el cron de artículos: ' . $e->getMessage());
    die('Error: ' . $e->getMessage());
}
