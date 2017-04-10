<?php

namespace App\Services\Countries;


use App\Models\Country;

class SaveCountry
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }

    public function handle() {
        $country = new Country();
        $country->name = $this->name;
        $country->slug = $this->slug;
        $country->active = $this->active;

        if ($country->save()) {
            return $country;
        }

        throw new \Exception("Error Processing User");
    }

    public static function fire($data) {
        return (new SaveCountry($data))->handle();
    }


}