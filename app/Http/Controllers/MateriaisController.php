<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MateriaiCreateRequest;
use App\Http\Requests\MateriaiUpdateRequest;
use App\Repositories\MateriaiRepository;
use App\Validators\MateriaiValidator;

/**
 * Class MateriaisController.
 *
 * @package namespace App\Http\Controllers;
 */
class MateriaisController extends Controller
{


    public function cadastrarMaterial(Request $request){
        $request = $request->all();

        try {
            $usuario = \Session::get('usuario');
            DB::table('materiais')->insert([
                'codPessoa' => $usuario->idUsuario,
                'tipo' => $request['tipo'],
                'quantidade' => $request['quantidade'],
                'situacaoMaterial' => $request['situacaoMaterial'],
                'created_at' => now(),
            ]);
            $resposta = "sucesso";
            $erro = null;
        }catch (\Exception $exception){
            $resposta = "falha";
            $erro = $exception->getMessage();
        }

        $return = array('resposta' => $resposta, 'erro' => $erro);

        echo json_encode($return);

    }



    /**
     * @var MateriaiRepository
     */
    protected $repository;

    /**
     * @var MateriaiValidator
     */
    protected $validator;

    /**
     * MateriaisController constructor.
     *
     * @param MateriaiRepository $repository
     * @param MateriaiValidator $validator
     */
    public function __construct(MateriaiRepository $repository, MateriaiValidator $validator)
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
        $materiais = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $materiais,
            ]);
        }

        return view('materiais.index', compact('materiais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MateriaiCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MateriaiCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $materiai = $this->repository->create($request->all());

            $response = [
                'message' => 'Materiai created.',
                'data'    => $materiai->toArray(),
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
        $materiai = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $materiai,
            ]);
        }

        return view('materiais.show', compact('materiai'));
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
        $materiai = $this->repository->find($id);

        return view('materiais.edit', compact('materiai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MateriaiUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MateriaiUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $materiai = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Materiai updated.',
                'data'    => $materiai->toArray(),
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
                'message' => 'Materiai deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Materiai deleted.');
    }
}
