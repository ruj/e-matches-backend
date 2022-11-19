<?php

require dirname(__DIR__) . '/model/Arena.php';

class ArenaController extends Database
{
    public $arena;

    function __construct()
    {
        parent::__construct();
    }

    public function insert($body)
    {
        $arena = new Arena((object) $body);
        $id = $this->database->insert(
            'arenas',
            [
                'name' => $arena->getName(),
                'address' => $arena->getAddress(),
                'country' => $arena->getCountry(),
                'opening_at' => $arena->getOpeningAt()
            ]
        );

        return $id;
    }

    public function getAll()
    {
        $arenas = [];
        $data = $this->database->fetchRowMany('select * from arenas', []);

        foreach ($data as $arena) {
            $arenas[] = new Arena((object) $arena);
        }

        return $arenas;
    }

    public function getById($id)
    {
        $data = $this->database->fetchRow('select * from arenas where id = :id', [':id' => $id]);

        return new Arena((object) $data);
    }

    public function update($body)
    {
        $arena = new Arena($body);

        $updated = $this->database->update(
            'arenas',
            [
                'id' => $arena->getId()
            ],
            [
                'name' => $arena->getName(),
                'address' => $arena->getAddress(),
                'country' => $arena->getCountry(),
                'opening_at' => $arena->getOpeningAt()
            ],
            'id = :id'
        );

        return $updated;
    }

    public function delete($id)
    {
        return $this->database->delete('arenas', ['id' => $id]);
    }

    public function getAllGamesById($id)
    {
        return $this->database->fetchRowMany('
            select
                g.*
            from
                games g,
                arenas a
            where
                a.id = g.arena_id
                and a.id = :id
            ',
            ['id' => $id]
        );
    }
}
