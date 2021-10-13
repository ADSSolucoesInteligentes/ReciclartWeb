<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PessoaCreateRequest;
use App\Http\Requests\PessoaUpdateRequest;
use App\Repositories\PessoaRepository;
use App\Validators\PessoaValidator;

/**
 * Class PessoasController.
 *
 * @package namespace App\Http\Controllers;
 */
class PessoasController extends Controller
{
    /**
     * @var PessoaRepository
     */
    protected $repository;

    /**
     * @var PessoaValidator
     */
    protected $validator;

    /**
     * PessoasController constructor.
     *
     * @param PessoaRepository $repository
     * @param PessoaValidator $validator
     */
    public function __construct(PessoaRepository $repository, PessoaValidator $validator)
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
        $pessoas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pessoas,
            ]);
        }

        return view('pessoas.index', compact('pessoas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PessoaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PessoaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $pessoa = $this->repository->create($request->all());

            $response = [
                'message' => 'Pessoa created.',
                'data'    => $pessoa->toArray(),
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
        $pessoa = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pessoa,
            ]);
        }

        return view('pessoas.show', compact('pessoa'));
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
        $pessoa = $this->repository->find($id);

        return view('pessoas.edit', compact('pessoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PessoaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PessoaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $pessoa = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Pessoa updated.',
                'data'    => $pessoa->toArray(),
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
                'message' => 'Pessoa deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Pessoa deleted.');
    }
}
