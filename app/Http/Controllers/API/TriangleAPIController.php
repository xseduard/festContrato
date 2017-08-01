<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTriangleAPIRequest;
use App\Http\Requests\API\UpdateTriangleAPIRequest;
use App\Models\Triangle;
use App\Repositories\TriangleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TriangleController
 * @package App\Http\Controllers\API
 */

class TriangleAPIController extends AppBaseController
{
    /** @var  TriangleRepository */
    private $triangleRepository;

    public function __construct(TriangleRepository $triangleRepo)
    {
        $this->triangleRepository = $triangleRepo;
    }

    /**
     * Display a listing of the Triangle.
     * GET|HEAD /triangles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->triangleRepository->pushCriteria(new RequestCriteria($request));
        $this->triangleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $triangles = $this->triangleRepository->all();

        return $this->sendResponse($triangles->toArray(), 'Triangles retrieved successfully');
    }

    /**
     * Store a newly created Triangle in storage.
     * POST /triangles
     *
     * @param CreateTriangleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTriangleAPIRequest $request)
    {
        $input = $request->all();

        $triangles = $this->triangleRepository->create($input);

        return $this->sendResponse($triangles->toArray(), 'Triangle saved successfully');
    }

    /**
     * Display the specified Triangle.
     * GET|HEAD /triangles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Triangle $triangle */
        $triangle = $this->triangleRepository->findWithoutFail($id);

        if (empty($triangle)) {
            return $this->sendError('Triangle not found');
        }

        return $this->sendResponse($triangle->toArray(), 'Triangle retrieved successfully');
    }

    /**
     * Update the specified Triangle in storage.
     * PUT/PATCH /triangles/{id}
     *
     * @param  int $id
     * @param UpdateTriangleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTriangleAPIRequest $request)
    {
        $input = $request->all();

        /** @var Triangle $triangle */
        $triangle = $this->triangleRepository->findWithoutFail($id);

        if (empty($triangle)) {
            return $this->sendError('Triangle not found');
        }

        $triangle = $this->triangleRepository->update($input, $id);

        return $this->sendResponse($triangle->toArray(), 'Triangle updated successfully');
    }

    /**
     * Remove the specified Triangle from storage.
     * DELETE /triangles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Triangle $triangle */
        $triangle = $this->triangleRepository->findWithoutFail($id);

        if (empty($triangle)) {
            return $this->sendError('Triangle not found');
        }

        $triangle->delete();

        return $this->sendResponse($id, 'Triangle deleted successfully');
    }
}
