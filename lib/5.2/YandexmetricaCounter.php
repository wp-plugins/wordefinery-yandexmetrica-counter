<?php

final class Wordefinery_YandexmetricaCounter {

    const VERSION = '0.6.0';
    const DB = false;
    private $path = '';
    private $_is_counter = 0;

    function __construct($path) {
        $this->path = $path;

        $this->plugin_title = wr___('Wordefinery Yandex.Metrica Counter');
        $this->plugin_slug = 'wordefinery-yandexmetricacounter';


        add_action( 'admin_notices', create_function('', "
            echo '<div class=\"error\"><p>';
            echo '<b>{$this->plugin_title}</b>: ';
            printf(wr___('require PHP version 5.3 or greater (current PHP version - %1\$s)'), PHP_VERSION);
            echo '<img src=\"http://wordefinery.com/i/php-version.gif?'.PHP_VERSION.'\" width=\"1\" height=\"1\" border=\"0\" alt=\"\" />';
            echo '</p></div>';
        "));

    }

}