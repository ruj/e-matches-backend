<?php

class Team implements JsonSerializable
{
    public $id;
    public $name;
    public $icon;
    public $country;
    public $player_one;
    public $player_two;
    public $player_three;
    public $player_four;
    public $player_five;
    public $player_support;
    public $coach;
    public $wins;
    public $defeats;

    function __construct($team)
    {
        $this->id = $team->id ?? null;
        $this->name = $team->name ?? null;
        $this->icon = $team->icon ?? null;
        $this->country = $team->country ?? null;
        $this->player_one = $team->player_one ?? null;
        $this->player_two = $team->player_two ?? null;
        $this->player_three = $team->player_three ?? null;
        $this->player_four = $team->player_four ?? null;
        $this->player_five = $team->player_five ?? null;
        $this->player_support = $team->player_support ?? null;
        $this->coach = $team->coach ?? null;
        $this->wins = $team->wins ?? null;
        $this->defeats = $team->defeats ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => $this->icon,
            'country' => $this->country,
            'player_one' => $this->player_one,
            'player_two' => $this->player_two,
            'player_three' => $this->player_three,
            'player_four' => $this->player_four,
            'player_five' => $this->player_five,
            'player_support' => $this->player_support,
            'coach' => $this->coach,
            'wins' => $this->wins,
            'defeats' => $this->defeats
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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of icon
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set the value of icon
     *
     * @return  self
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get the value of country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of player_one
     */
    public function getPlayerOne()
    {
        return $this->player_one;
    }

    /**
     * Set the value of player_one
     *
     * @return  self
     */
    public function setPlayerOne($player_one)
    {
        $this->player_one = $player_one;

        return $this;
    }

    /**
     * Get the value of player_two
     */
    public function getPlayerTwo()
    {
        return $this->player_two;
    }

    /**
     * Set the value of player_two
     *
     * @return  self
     */
    public function setPlayerTwo($player_two)
    {
        $this->player_two = $player_two;

        return $this;
    }

    /**
     * Get the value of player_three
     */
    public function getPlayerThree()
    {
        return $this->player_three;
    }

    /**
     * Set the value of player_three
     *
     * @return  self
     */
    public function setPlayerThree($player_three)
    {
        $this->player_three = $player_three;

        return $this;
    }

    /**
     * Get the value of player_four
     */
    public function getPlayerFour()
    {
        return $this->player_four;
    }

    /**
     * Set the value of player_four
     *
     * @return  self
     */
    public function setPlayerFour($player_four)
    {
        $this->player_four = $player_four;

        return $this;
    }

    /**
     * Get the value of player_five
     */
    public function getPlayerFive()
    {
        return $this->player_five;
    }

    /**
     * Set the value of player_five
     *
     * @return  self
     */
    public function setPlayerFive($player_five)
    {
        $this->player_five = $player_five;

        return $this;
    }

    /**
     * Get the value of player_support
     */
    public function getPlayerSupport()
    {
        return $this->player_support;
    }

    /**
     * Set the value of player_support
     *
     * @return  self
     */
    public function setPlayerSupport($player_support)
    {
        $this->player_support = $player_support;

        return $this;
    }

    /**
     * Get the value of coach
     */
    public function getCoach()
    {
        return $this->coach;
    }

    /**
     * Set the value of coach
     *
     * @return  self
     */
    public function setCoach($coach)
    {
        $this->coach = $coach;

        return $this;
    }

    /**
     * Get the value of wins
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * Set the value of wins
     *
     * @return  self
     */
    public function setWins($wins)
    {
        $this->wins = $wins;

        return $this;
    }

    /**
     * Get the value of defeats
     */
    public function getDefeats()
    {
        return $this->defeats;
    }

    /**
     * Set the value of defeats
     *
     * @return  self
     */
    public function setDefeats($defeats)
    {
        $this->defeats = $defeats;

        return $this;
    }
}
