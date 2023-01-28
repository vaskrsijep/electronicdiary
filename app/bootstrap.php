<?php
// Load Config
require_once 'config/config.php';
// Load Helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/array_search_helper.php';
require_once 'helpers/display_row_helper.php';
require_once 'helpers/display_insert_for_schedule.php';

// Autoload Core Libraries
spl_autoload_register(function ($className) {
  require_once 'libraries/' . $className . '.php';
});
