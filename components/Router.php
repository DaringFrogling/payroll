<?php


class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /*
    *   Returns request string
    */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        //  getting request uri
        $uri = $this->getURI();

        // checking availability of request on Routes.php
        foreach ($this->routes as $uriPattern => $path) {

            //comparing $uriPattern & $path
            if (preg_match("~$uriPattern~", $uri)) {

                //getting inner path from outer due to pattern
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //detecting controller, action, parameters
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst((array_shift($segments)));

                $parameters = $segments;

                // controller files connection
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                }

                // creating object and calling method (action)
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if($result != null) {
                    break;
                }
            }
        }
    }
}