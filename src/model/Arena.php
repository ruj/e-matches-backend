<?php

class Arena implements JsonSerializable
{
    public $id;
    public $name;
    public $address;
    public $country;
    public $opening_at;

    function __construct($arena)
    {
        $this->id = $arena->id ?? null;
        $this->name = $arena->name ?? null;
        $this->address = $arena->address ?? null;
        $this->country = $arena->country ?? null;
        $this->opening_at = $arena->opening_at ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'country' => $this->country,
            'opening_at' => $this->opening_at
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
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

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
     * Get the value of opening_at
     */
    public function getOpeningAt()
    {
        return $this->opening_at;
    }

    /**
     * Set the value of opening_at
     *
     * @return  self
     */
    public function setOpeningAt($opening_at)
    {
        $this->opening_at = $opening_at;

        return $this;
    }
}
