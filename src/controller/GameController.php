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
        $id = $this->database->insert('games', [
            'title' => $game->getTitle(),
            'arena_id' => $game->getArenaId(),
            'status' => $game->getStatus(), // P
            'first_team_id' => $game->getFirstTeamId(),
            'second_team_id' => $game->getSecondTeamId(),
            'event_date' => $game->getEventDate(),
            'start_in' => $game->getStartIn(),
            'duration' => $game->getDuration()
            // 'winning_team_id' => $game->getWinningTeamId()
        ]);

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
        $data = $this->database->fetchRow(
            'select * from games where id = :id',
            [':id' => $id]
        );

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

    public function getGameDetailsById($id)
    {
        return $this->database->fetchRow(
            "
            select
                `json`
            from (
                select
                    json_object(
                        'id', g.id,
                        'title', g.title,
                        'arena', json_object(
                            'id', a.id,
                            'name', a.name,
                            'address', a.address,
                            'country', a.country,
                            'opening_at', a.opening_at
                        ),
                        'status', g.status,
                        'first_team', json_object(
                            'id', t1.id,
                            'name', t1.name,
                            'icon', t1.icon,
                            'country', t1.country,
                            'player_one', t1.player_one,
                            'player_two', t1.player_two,
                            'player_three', t1.player_three,
                            'player_four', t1.player_four,
                            'player_five', t1.player_five,
                            'player_support', t1.player_support,
                            'coach', t1.coach,
                            'wins', t1.wins,
                            'defeats', t1.defeats
                        ),
                        'second_team', json_object(
                            'id', t2.id,
                            'name', t2.name,
                            'icon', t2.icon,
                            'country', t2.country,
                            'player_one', t2.player_one,
                            'player_two', t2.player_two,
                            'player_three', t2.player_three,
                            'player_four', t2.player_four,
                            'player_five', t2.player_five,
                            'player_support', t2.player_support,
                            'coach', t2.coach,
                            'wins', t2.wins,
                            'defeats', t2.defeats
                        ),
                        'event_date', g.event_date,
                        'start_in', g.start_in,
                        'duration', g.duration,
                        'winning_team', json_object(
                            'id', tw.id,
                            'name', tw.name,
                            'icon', tw.icon,
                            'country', tw.country,
                            'player_one', tw.player_one,
                            'player_two', tw.player_two,
                            'player_three', tw.player_three,
                            'player_four', tw.player_four,
                            'player_five', tw.player_five,
                            'player_support', tw.player_support,
                            'coach', tw.coach,
                            'wins', tw.wins,
                            'defeats', tw.defeats
                        )
                    ) `json`
                from
                    games g
                    left join
                        arenas a on g.arena_id = a.id
                    left join
                        teams t1 on g.first_team_id = t1.id
                    left join
                        teams t2 on g.second_team_id = t2.id
                    left join
                        teams tw on g.winning_team_id = tw.id
                where
                    g.id = :id
            ) `json`
            ",
            ['id' => $id]
        );
    }
}
