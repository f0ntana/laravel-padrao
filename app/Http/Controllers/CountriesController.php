<?php

namespace App\Http\Controllers;

use App\Http\Requests\Countries\CreateRequest;
use App\Http\Requests\Countries\DestroyRequest;
use App\Http\Requests\Countries\GetRequest;
use App\Http\Requests\Countries\UpdateRequest;
use App\Services\Countries\CountriesService;

class CountriesController extends Controller
{

    /**
     * @var CountriesService
     */
    private $repository;

    /**
     * CompaniesController constructor.
     * @param CountriesService $repository
     */
    public function __construct(CountriesService $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetRequest $request)
    {
        return response($this->repository->getAll(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        return response($this->repository->create(
            $request->get('name'),
            $request->get('active')
        ), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param GetRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(GetRequest $request, $id)
    {
        return response($this->repository->find($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function update(UpdateRequest $request, $id)
    {
        if ($country = $this->repository->find($id)) {
            return response($this->repository->update(
                $country,
                $request->get('name'),
                $request->get('active')
            ), 200);
        }

        return response('Error', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(DestroyRequest $request, $id)
    {
        return response($this->repository->delete($id), 200);
    }
}