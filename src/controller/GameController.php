<?php

require dirname(__DIR__) . '/model/Game.php';

class GameController extends Database
{
    public $game;

    function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $game = new Game((object) $data);
        $id = $this->database->insert(
            'games',
            [
                'title' => $game->getTitle(),
                'arena_id' => $game->getArenaId(),
                'status' => $game->getStatus(), // P
                'first_team_id' => $game->getFirstTeamId(),
                'second_team_id' => $game->getSecondTeamId(),
                'event_date' => $game->getEventDate(),
                'start_in' => $game->getStartIn(),
                'duration' => $game->getDuration(),
                // 'winning_team_id' => $game->getWinningTeamId()
            ]
        );

        return $id;
    }

    public function getAll()
    {
        $games = [];
        $data = $this->database->fetchRowMany('select * from games', []);

        foreach ($data as $game) {
            $games[] = new Game((object) $game);
        }

        return $games;
    }

    public function getById($id)
    {
        $data = $this->database->fetchRow('select * from games where id = :id', [':id' => $id]);

        return new Game((object) $data);
    }

    public function update($body)
    {
        $game = new Game($body);
        $updated = $this->database->update(
            'games',
            [
                'id' => $game->getId()
            ],
            [
                'title' => $game->getTitle(),
                'arena_id' => $game->getArenaId(),
                'status' => $game->getStatus(),
                'first_team_id' => $game->getFirstTeamId(),
                'second_team_id' => $game->getSecondTeamId(),
                'event_date' => $game->getEventDate(),
                'start_in' => $game->getStartIn(),
                'duration' => $game->getDuration(),
                'winning_team_id' => $game->getWinningTeamId()
            ],
            'id = :id'
        );

        return $updated;
    }

    public function delete($id)
    {
        return $this->database->delete('games', ['id' => $id]);
    }
}
