<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MaterialsRequestCreateRequest;
use App\Http\Requests\MaterialsRequestUpdateRequest;
use App\Repositories\MaterialsRequestRepository;
use App\Validators\MaterialsRequestValidator;

/**
 * Class MaterialsRequestsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MaterialsRequestsController extends Controller
{
    /**
     * @var MaterialsRequestRepository
     */
    protected $repository;

    /**
     * @var MaterialsRequestValidator
     */
    protected $validator;

    /**
     * MaterialsRequestsController constructor.
     *
     * @param MaterialsRequestRepository $repository
     * @param MaterialsRequestValidator $validator
     */
    public function __construct(MaterialsRequestRepository $repository, MaterialsRequestValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $materialsRequests = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $materialsRequests,
            ]);
        }

        return view('materialsRequests.index', compact('materialsRequests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MaterialsRequestCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MaterialsRequestCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $materialsRequest = $this->repository->create($request->all());

            $response = [
                'message' => 'MaterialsRequest created.',
                'data'    => $materialsRequest->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materialsRequest = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $materialsRequest,
            ]);
        }

        return view('materialsRequests.show', compact('materialsRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materialsRequest = $this->repository->find($id);

        return view('materialsRequests.edit', compact('materialsRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MaterialsRequestUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MaterialsRequestUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $materialsRequest = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'MaterialsRequest updated.',
                'data'    => $materialsRequest->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'MaterialsRequest deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'MaterialsRequest deleted.');
    }
}
