<?php

/**
 * 
 */
namespace Classes;
use FastRoute\Dispatcher;
class Router
{       
    
    function __construct()
    {
        $dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {

            // auth routers
            $r->addRoute('GET', '/onlineQuizSystem/abc/{id:\d+}/{username}', 'get_all_users_handler');

            //Login and sign up
            $r->addRoute('GET', '/onlineQuizSystem/signup', 'viewSignup@UserAuth');
            $r->addRoute('POST', '/onlineQuizSystem/doSignup', 'doSignup@UserAuth');
            $r->addRoute('GET', '/onlineQuizSystem/login', 'viewLogin@UserAuth');
            $r->addRoute('POST', '/onlineQuizSystem/doLogin', 'doLogin@UserAuth');
            $r->addRoute('GET', '/onlineQuizSystem/doLogout', 'doLogout@UserAuth');


            $r->addRoute('GET', '/onlineQuizSystem/', 'viewHome@Home');
            $r->addRoute('GET', '/onlineQuizSystem/userDashboard', 'viewDash@Home');

            // quiz
            $r->addRoute('POST', '/onlineQuizSystem/viewQuestion', 'show@Quiz');
            $r->addRoute('POST', '/onlineQuizSystem/result', 'showResult@Quiz');

            //contact 
            $r->addRoute('GET', '/onlineQuizSystem/contactUs', 'contactUs@contactUser');
            $r->addRoute('POST', '/onlineQuizSystem/doContact', 'doContact@contactUser');


        });

        // Fetch method and URI from somewhere
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }

        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                echo "Not found<br>";
                print_r($routeInfo);
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                echo "method not allowed";
                break;
            case \FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];

                $arr = explode("@", $handler);
                $controller = $arr[1];
                $methodName = $arr[0];
                $controller = "Classes\controller\\".$controller;

                // check if iscallable
                if (method_exists($controller, $methodName)) {
                    call_user_func_array([new $controller, $methodName], [$vars]);
                    
                }
                else{
                    print_r($controller);
                    echo "<br>";
                    print_r($methodName);
                    echo "<br/>";
                    print_r("Controller or method does not exist ");
                }
                break;
        }

    }
}