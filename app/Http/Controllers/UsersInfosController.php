<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UsersInfoCreateRequest;
use App\Http\Requests\UsersInfoUpdateRequest;
use App\Repositories\UsersInfoRepository;
use App\Validators\UsersInfoValidator;

/**
 * Class UsersInfosController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersInfosController extends Controller
{
    /**
     * @var UsersInfoRepository
     */
    protected $repository;

    /**
     * @var UsersInfoValidator
     */
    protected $validator;

    /**
     * UsersInfosController constructor.
     *
     * @param UsersInfoRepository $repository
     * @param UsersInfoValidator $validator
     */
    public function __construct(UsersInfoRepository $repository, UsersInfoValidator $validator)
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
        $usersInfos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $usersInfos,
            ]);
        }

        return view('usersInfos.index', compact('usersInfos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UsersInfoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UsersInfoCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $usersInfo = $this->repository->create($request->all());

            $response = [
                'message' => 'UsersInfo created.',
                'data'    => $usersInfo->toArray(),
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
        $usersInfo = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $usersInfo,
            ]);
        }

        return view('usersInfos.show', compact('usersInfo'));
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
        $usersInfo = $this->repository->find($id);

        return view('usersInfos.edit', compact('usersInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UsersInfoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UsersInfoUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $usersInfo = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'UsersInfo updated.',
                'data'    => $usersInfo->toArray(),
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
                'message' => 'UsersInfo deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UsersInfo deleted.');
    }
}
