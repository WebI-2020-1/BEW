<?php
    require_once(__DIR__.'/../autoload.php');
    class Route{
        private static $routes = [];

        public static function get($route, $controller, $method = 'GET'){
            array_push(self::$routes, array(
                'route' => explode(':', $route)[0],
                'controller' => explode('@',$controller)[0],
                'function' => explode('@',$controller)[1],
                'method' => $method,
                'params' => $_GET
            ));
        }
        public static function post($route, $controller, $method = 'POST'){
            array_push(self::$routes, array(
                'route' => $route,
                'controller' => explode('@',$controller)[0],
                'function' => explode('@',$controller)[1],
                'method' => $method,
                'params' => $_POST
            ));
        }

        public static function run($basepath = '/'){
            $parsed_url = parse_url($_SERVER['REQUEST_URI']);
            $method = $_SERVER['REQUEST_METHOD'];
            $notfound = true;

            if(isset($parsed_url['path'])){
                $url = explode('&',$parsed_url['path'])[0];
            }else{
                $url = '/';
            }
            foreach(self::$routes as $route){
                if($route['route'] == $url){
                    $notfound = false;
                    if($route['method'] != $method){
                        header("HTTP/1.0 405 Method Not Allowed");
                    }else{
                        $controller = $route['controller'];
                        $function = $route['function'];
                        $controller = new $controller();
                        $controller->$function($route['params']);
                    }
                }

            }
            if($url == '/'){
                return redirect('/login');
            }
            if($notfound){
                header("HTTP/1.0 404 Not Found");
                require_once(__DIR__.'/../src/Views/404.php');
            }
        }
    }
?>