<?php

require dirname(__DIR__) . '/model/Team.php';

class TeamController extends Database
{
    public $team;

    function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $team = new Team((object) $data);
        $id = $this->database->insert('teams', [
            'name' => $team->getName(),
            'icon' => $team->getIcon(),
            'country' => $team->getCountry(),
            'player_one' => $team->getPlayerOne(),
            'player_two' => $team->getPlayerTwo(),
            'player_three' => $team->getPlayerThree(),
            'player_four' => $team->getPlayerFour(),
            'player_five' => $team->getPlayerFive(),
            'player_support' => $team->getPlayerSupport(),
            'coach' => $team->getCoach()
        ]);

        return $id;
    }

    public function getAll()
    {
        $teams = [];
        $data = $this->database->fetchRowMany('select * from teams', []);

        foreach ($data as $team) {
            $teams[] = new Team((object) $team);
        }

        return $teams;
    }

    public function getById($id)
    {
        $data = $this->database->fetchRow(
            'select * from teams where id = :id',
            [':id' => $id]
        );

        return new Team((object) $data);
    }

    public function update($body)
    {
        $team = new Team($body);

        $updated = $this->database->update(
            'teams',
            [
                'id' => $team->getId()
            ],
            [
                'name' => $team->getName(),
                'icon' => $team->getIcon(),
                'country' => $team->getCountry(),
                'player_one' => $team->getPlayerOne(),
                'player_two' => $team->getPlayerTwo(),
                'player_three' => $team->getPlayerThree(),
                'player_four' => $team->getPlayerFour(),
                'player_five' => $team->getPlayerFive(),
                'player_support' => $team->getPlayerSupport(),
                'coach' => $team->getCoach(),
                'wins' => $team->getWins(),
                'defeats' => $team->getDefeats()
            ],
            'id = :id'
        );

        return $updated;
    }

    public function delete($id)
    {
        return $this->database->delete('teams', ['id' => $id]);
    }

    public function getAllGamesByWhere($where)
    {
        return $this->database->fetchRowMany("
            select
                g.*
            from
                games g,
                teams t
            where
                $where
        ") ?? [];
    }
}
