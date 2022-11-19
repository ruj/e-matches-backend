<?php

header("Access-Control-Allow-Origin: *");

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteParser;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/Database.php';
require dirname(__DIR__) . '/controller/ArenaController.php';
require dirname(__DIR__) . '/controller/GameController.php';
require dirname(__DIR__) . '/controller/TeamController.php';

$router = new RouteCollector();

$router->group(['prefix' => 'api'], function ($router) {
    // ARENAS
    $router->group(['prefix' => 'arenas'], function ($router) {
        // POST api/arenas
        $router->post('/', function () {
            $arenaController = new ArenaController();
            return json_encode($arenaController->insert($_POST));
        });

        // GET api/arenas
        $router->get('/', function () {
            $arenaController = new ArenaController();
            return json_encode($arenaController->getAll());
        });

        // GET api/arenas/{id}
        $router->get('/{id}', function ($id) {
            $arenaController = new ArenaController();
            return json_encode($arenaController->getById($id));
        });

        // POST api/arenas/{id}
        $router->post('/{id}', function ($id) {
            $arenaController = new ArenaController();
            $arena = $arenaController->getById($id);

            if (!$arena->getId()) {
                throw new Exception('Arena not found');
            }

            return json_encode(
                $arenaController->update(
                    (object) array_merge((array) $arena, (array) $_POST)
                )
            );
        });

        // DELETE api/arenas/{id}
        $router->delete('/{id}', function ($id) {
            $arenaController = new ArenaController();
            return json_encode($arenaController->delete($id));
        });
    });

    // GAMES
    $router->group(['prefix' => 'games'], function ($router) {
        // POST api/games
        $router->post('/', function () {
            // var_dump($_POST);
            // exit;

            $gameController = new GameController();
            return json_encode($gameController->insert($_POST));
        });

        // GET api/games
        $router->get('/', function () {
            $gameController = new GameController();
            return json_encode($gameController->getAll());
        });

        // GET api/games/{id}
        $router->get('/{id}', function ($id) {
            $gameController = new GameController();
            return json_encode($gameController->getById($id));
        });

        // POST api/games/{id}
        $router->post('/{id}', function ($id) {
            $gameController = new GameController();
            $game = $gameController->getById($id);

            if (!$game->getId()) {
                throw new Exception('Game not found');
            }

            return json_encode(
                $gameController->update(
                    (object) array_merge((array) $game, (array) $_POST)
                )
            );
        });

        // DELETE api/games/{id}
        $router->delete('/{id}', function ($id) {
            $gameController = new GameController();
            return json_encode($gameController->delete($id));
        });
    });

    // TEAMS
    $router->group(['prefix' => 'teams'], function ($router) {
        // POST api/teams
        $router->post('/', function () {
            $teamController = new TeamController();
            return json_encode($teamController->insert($_POST));
        });

        // GET api/teams
        $router->get('/', function () {
            $teamController = new TeamController();
            return json_encode($teamController->getAll());
        });

        // GET api/teams/{id}
        $router->get('/{id}', function ($id) {
            $teamController = new TeamController();
            return json_encode($teamController->getById($id));
        });

        // POST api/teams/{id}
        $router->post('/{id}', function ($id) {
            $teamController = new TeamController();
            $team = $teamController->getById($id);

            if (!$team->getId()) {
                throw new Exception('Team not found');
            }

            return json_encode(
                $teamController->update(
                    (object) array_merge((array) $team, (array) $_POST)
                )
            );
        });

        // DELETE api/teams/{id}
        $router->delete('/{id}', function ($id) {
            $teamController = new TeamController();
            return json_encode($teamController->delete($id));
        });
    });
});

$dispatcher = new Dispatcher($router->getData());

try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
} catch (HttpRouteNotFoundException $e) {
    http_response_code(404);
    echo json_encode(['message' => 'Not Found']);
    die();
} catch (HttpMethodNotAllowedException $e) {
    http_response_code(405);
    echo json_encode(['message' => 'Method Not Allowed']);
    die();
} catch (\Throwable $th) {
    // var_dump($th);
    http_response_code(500);
    echo json_encode(['message' => $th->getMessage()]);
    die();
}

echo $response;
