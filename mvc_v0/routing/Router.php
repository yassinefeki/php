<?php
class Router {
    protected $routes = [];

    public function addRoute($uri, $controllerAction) {
        $this->routes[$uri] = $controllerAction;
    }

    public function dispatch($uri) {
          
        $controllerAction = $this->getControllerAction($uri);
        
        if ($controllerAction === false) {
            // Handle 404: route not found
            echo '404 Not Found';
            return;
        }

        list($controllerName, $actionName) = explode('@', $controllerAction);
        
        // Include the appropriate controller file
        require_once __DIR__ . '/../app/controllers/' . $controllerName . '.php';

        // Create an instance of the controller
        $controller = new $controllerName();
        
        // Call the action method
        $controller->$actionName();
    }

    protected function getControllerAction($uri) {
        
        return isset($this->routes[$uri]) ? $this->routes[$uri] : false;
    }
}
