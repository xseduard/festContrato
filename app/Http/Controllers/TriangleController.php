<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTriangleRequest;
use App\Http\Requests\UpdateTriangleRequest;
use App\Repositories\TriangleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TriangleController extends AppBaseController
{
    /** @var  TriangleRepository */
    private $triangleRepository;

    public function __construct(TriangleRepository $triangleRepo)
    {
        $this->middleware('auth');
        $this->triangleRepository = $triangleRepo;
    }

    /**
     * Display a listing of the Triangle.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->triangleRepository->pushCriteria(new RequestCriteria($request));
        $triangles = $this->triangleRepository->all();

        return view('triangles.index')
            ->with('triangles', $triangles);
    }

    /**
     * Show the form for creating a new Triangle.
     *
     * @return Response
     */
    public function create()
    {
        return view('triangles.create');
    }

    /**
     * Store a newly created Triangle in storage.
     *
     * @param CreateTriangleRequest $request
     *
     * @return Response
     */
    public function store(CreateTriangleRequest $request)
    {
        $input = $request->all();

        $triangle = $this->triangleRepository->create($input);

        Flash::success('Triangle saved successfully.');

        return redirect(route('triangles.index'));
    }

    /**
     * Display the specified Triangle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $triangle = $this->triangleRepository->findWithoutFail($id);

        if (empty($triangle)) {
            Flash::error('Triangle not found');

            return redirect(route('triangles.index'));
        }

        return view('triangles.show')->with('triangle', $triangle);
    }

    /**
     * Show the form for editing the specified Triangle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $triangle = $this->triangleRepository->findWithoutFail($id);

        if (empty($triangle)) {
            Flash::error('Triangle not found');

            return redirect(route('triangles.index'));
        }

        return view('triangles.edit')->with('triangle', $triangle);
    }

    /**
     * Update the specified Triangle in storage.
     *
     * @param  int              $id
     * @param UpdateTriangleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTriangleRequest $request)
    {
        $triangle = $this->triangleRepository->findWithoutFail($id);

        if (empty($triangle)) {
            Flash::error('Triangle not found');

            return redirect(route('triangles.index'));
        }

        $triangle = $this->triangleRepository->update($request->all(), $id);

        Flash::success('Triangle updated successfully.');

        return redirect(route('triangles.index'));
    }

    /**
     * Remove the specified Triangle from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $triangle = $this->triangleRepository->findWithoutFail($id);

        if (empty($triangle)) {
            Flash::error('Triangle not found');

            return redirect(route('triangles.index'));
        }

        $this->triangleRepository->delete($id);

        Flash::success('Triangle deleted successfully.');

        return redirect(route('triangles.index'));
    }
}
