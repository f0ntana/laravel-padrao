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
     * @params
     */

    public function handle() {
        $country = new Country();
        $country->name = $this->setName();
        $country->slug = $this->setSlug();
        $country->active = $this->setActive();

        if ($country->save()) {
            return $country;
        }

        throw new \Exception("Error Processing User");
    }

    public static function fire($data) {
        return (new SaveCountry($data))->handle();
    }


}