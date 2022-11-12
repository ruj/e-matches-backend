<?php

class Game implements JsonSerializable
{
    public $id;
    public $title;
    public $arena_id;
    public $status;
    public $first_team_id;
    public $second_team_id;
    public $event_date;
    public $start_in;
    public $duration;
    public $winning_team_id;

    function __construct($game)
    {
        $this->id = $game->id ?? null;
        $this->title = $game->title ?? null;
        $this->arena_id = $game->arena_id ?? null;
        $this->status = $game->status ?? null;
        $this->first_team_id = $game->first_team_id ?? null;
        $this->second_team_id = $game->second_team_id ?? null;
        $this->event_date = $game->event_date ?? null;
        $this->start_in = $game->start_in ?? null;
        $this->duration = $game->duration ?? null;
        $this->winning_team_id = $game->winning_team_id ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'arena_id' => $this->arena_id,
            'status' => $this->status,
            'first_team_id' => $this->first_team_id,
            'second_team_id' => $this->second_team_id,
            'event_date' => $this->event_date,
            'start_in' => $this->start_in,
            'duration' => $this->duration,
            'winning_team_id' => $this->winning_team_id
        ];
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of arena_id
     */
    public function getArenaId()
    {
        return $this->arena_id;
    }

    /**
     * Set the value of arena_id
     *
     * @return  self
     */
    public function setArenaId($arena_id)
    {
        $this->arena_id = $arena_id;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of first_team_id
     */
    public function getFirstTeamId()
    {
        return $this->first_team_id;
    }

    /**
     * Set the value of first_team_id
     *
     * @return  self
     */
    public function setFirstTeamId($first_team_id)
    {
        $this->first_team_id = $first_team_id;

        return $this;
    }

    /**
     * Get the value of second_team_id
     */
    public function getSecondTeamId()
    {
        return $this->second_team_id;
    }

    /**
     * Set the value of second_team_id
     *
     * @return  self
     */
    public function setSecondTeamId($second_team_id)
    {
        $this->second_team_id = $second_team_id;

        return $this;
    }

    /**
     * Get the value of event_date
     */
    public function getEventDate()
    {
        return $this->event_date;
    }

    /**
     * Set the value of event_date
     *
     * @return  self
     */
    public function setEventDate($event_date)
    {
        $this->event_date = $event_date;

        return $this;
    }

    /**
     * Get the value of start_in
     */
    public function getStartIn()
    {
        return $this->start_in;
    }

    /**
     * Set the value of start_in
     *
     * @return  self
     */
    public function setStartIn($start_in)
    {
        $this->start_in = $start_in;

        return $this;
    }

    /**
     * Get the value of duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set the value of duration
     *
     * @return  self
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the value of winning_team_id
     */
    public function getWinningTeamId()
    {
        return $this->winning_team_id;
    }

    /**
     * Set the value of winning_team_id
     *
     * @return  self
     */
    public function setWinningTeamId($winning_team_id)
    {
        $this->winning_team_id = $winning_team_id;

        return $this;
    }
}
