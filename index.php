<?php
// Autoloader
// =============================================================================
include_once 'config/autoload.php';
include_once 'lib/loggerRequest.php';


try {
    // Application setup
    // =========================================================================
    include_once 'config/application.php';

    // Routing
    // =========================================================================
    include_once 'config/routing.php';


    if (!$match) {
        echo $e = Response::raiseError(404, ['Resource not found.']);
        include_once 'lib/loggerResponse.php';
        die();
    }

    $headers = new Headers;
    if ($headers->isTesterTestRequest()) {
      Config::set('env', 'test');
    }
     $db_setup = 'db_'.Config::get('env');
     MyDB::connect(Config::get($db_setup));

    // Run Controller#action
    if ($match) {
        // $match from 'app/core/router.php'
        // $match['target'] => UserController#index

        list($controller_name, $action_name) = explode('#', $match['target']);

        $params = Request::params($match['params']);
        $params['controller'] = $controller_name;
        $params['action'] = $action_name;

        $controller = new $controller_name($params);
        $body = $controller->$action_name();

        echo $body;
        include_once 'lib/loggerResponse.php';

    }

} catch (Throwable $t) {
    if ($t->getCode() != 0) {
        $error_code = $t->getCode();
    } else {
        $error_code = 500;
    }

    echo Response::raiseError($error_code, [$t->getMessage()]);
}
include_once 'lib/loggerResponse.php';
