<?php

namespace Framework;

use App\Controllers\ErrorController;
use Framework\Middleware\Authorize;

class Router
{
	protected $routes = [];

	/**
	 * Register a route
	 * @param string $method
	 * @param string $uri
	 * @param string $action
	 * @param array $middleware
	 * 
	 * @return void
	 */
	public function registerRoute($method, $uri, $action, $middleware = [])
	{
		list($controller, $controllerMethod) = explode('@', $action);

		$this->routes[] = [
			'method' => $method,
			'uri' => $uri,
			'controller' => $controller,
			'controllerMethod' => $controllerMethod,
			'middleware' => $middleware
		];
	}

	/**
	 * Add a GET route
	 * @param string $uri
	 * @param mixed $controller
	 * @param array $middleware
	 * 
	 * @return void
	 */
	public function get($uri, $controller, $middleware = [])
	{
		$this->registerRoute('GET', $uri, $controller, $middleware);
	}

	/**
	 * Add a POST route
	 * @param string $uri
	 * @param string $controller
	 * @param array $middleware
	 * 
	 * @return void
	 */
	public function post($uri, $controller, $middleware = [])
	{
		$this->registerRoute('POST', $uri, $controller, $middleware);
	}

	/**
	 * Add a PUT route
	 * @param string $uri
	 * @param string $controller
	 * @param array $middleware
	 * 
	 * @return void
	 */
	public function put($uri, $controller, $middleware = [])
	{
		$this->registerRoute('PUT', $uri, $controller, $middleware);
	}

	/**
	 * Add a DELETE route
	 * @param string $uri
	 * @param string $controller
	 * @param array $middleware
	 * 
	 * @return void
	 */
	public function delete($uri, $controller, $middleware = [])
	{
		$this->registerRoute('DELETE', $uri, $controller, $middleware);
	}

	/**
	 * Route the request
	 * @param string $uri
	 * 
	 * @return void
	 */
	public function route($uri)
	{
		$requestMethod = $_SERVER['REQUEST_METHOD'];

		// Check for method override (for PUT and DELETE requests from forms)
		if ($requestMethod === 'POST' && isset($_POST['_method'])) {
			$overrideMethod = strtoupper($_POST['_method']);
			if (in_array($overrideMethod, ['PUT', 'DELETE'])) {
				$requestMethod = $overrideMethod;
			}
		}

		foreach ($this->routes as $route) {
			// Split the URI into segments for more flexible matching	
			$uriSegments = explode('/', trim($uri, '/'));

			// Split the route
			$routeSegments = explode('/', trim($route['uri'], '/'));

			if (count($uriSegments) === count($routeSegments) && strtoupper($route['method']) === $requestMethod) {
				$params = [];

				$match = true;

				for ($i = 0; $i < count($routeSegments); $i++) {
					if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
						$match = false;
						break;
					} elseif (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
						$params[$matches[1]] = $uriSegments[$i];
					}
				}

				if ($match) {
					foreach ($route['middleware'] as $middleware) {
						(new Authorize())->handle($middleware);
					}
					// Extract controller and its method
					$controller = 'App\\controllers\\' . $route['controller'];
					$controllerMethod = $route['controllerMethod'];

					$controllerInstance = new $controller();
					$controllerInstance->$controllerMethod($params); // Call the controller method
					return;
				}
			}
		}

		ErrorController::notFound("This quest has vanished beyond the kingdom borders.");
	}
}
