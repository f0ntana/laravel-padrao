<?php

namespace App\Services\Countries;

use App\Models\Country;

class CountriesService
{
    /**
     * Get a Country by the given ID.
     *
     * @param  int $id
     * @return Country|null
     */
    public function find($id)
    {
        return Country::find($id);
    }

    /**
     * Get a Country by the given ID.
     *
     * @param string $slug
     * @return Country|null
     */
    public function findBySlug(string $slug)
    {
        return Country::whereSlug($slug)->first();
    }

    /**
     * Get the Country instances.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Country::orderBy('name', 'asc')->get();
    }

    /**
     * Store a new Country.
     *
     * @param $name
     * @param bool $active
     * @return Country
     */
    public function create($name, $active = false)
    {
        $country = (new Country())->forceFill([
            'name' => $name,
            'slug' => str_slug($name),
            'active' => $active
        ]);

        $country->save();

        return $country;
    }

    /**
     * Update the given Country.
     *
     * @param Country $country
     * @param string $name
     * @param bool $active
     * @return Country
     */
    public function update(Country $country, $name, $active = false)
    {
        $country->forceFill([
            'name' => $name,
            'slug' => str_slug($name),
            'active' => $active,
        ])->save();

        return $country;
    }

    /**
     * Update the given Country.
     *
     * @param int $id
     * @return Country
     * @throws \Exception
     */
    public function delete(int $id)
    {
        $country = $this->find($id);
        $country->delete();

        return $country;
    }
}