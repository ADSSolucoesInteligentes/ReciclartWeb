<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PedidoCreateRequest;
use App\Http\Requests\PedidoUpdateRequest;
use App\Repositories\PedidoRepository;
use App\Validators\PedidoValidator;

/**
 * Class PedidosController.
 *
 * @package namespace App\Http\Controllers;
 */
class PedidosController extends Controller
{

    public function gerarPedido(Request $request){
        $request = $request->all();

        try {
            $material = DB::table('materiais')->select('*')
                ->where('tipo', '=', $request['tipo'])
                ->get();

            $usuario = \Session::get('usuario');

            DB::table('pedidos')->insert([
               'codMaterial' => $material->codMaterial,
                'codPessoa_solicitante' => $usuario['idUsuario'],
                'codPessoa_fornecedor' =>  $material['codPessoa'],
                'dataHoraAgndamento' => $request['dataHoraAgendamento'],
                'dataRetirada' => $request['dataRetirada'],
                'dataCancelamento' => null,
                'situacaoPedido' => 'pi',
                'created_at' => now(),
            ]);

            $erro = null;
            $resposta = 'sucesso';

        }catch (\Exception $e){
            $erro = $e->getMessage();
            $resposta = "falha";
        }

        $return = array('resposta' => $resposta, 'erro' => $erro);
        return json_encode($return);
    }

    /**
     * @var PedidoRepository
     */
    protected $repository;

    /**
     * @var PedidoValidator
     */
    protected $validator;

    /**
     * PedidosController constructor.
     *
     * @param PedidoRepository $repository
     * @param PedidoValidator $validator
     */
    public function __construct(PedidoRepository $repository, PedidoValidator $validator)
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
        $pedidos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pedidos,
            ]);
        }

        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PedidoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PedidoCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $pedido = $this->repository->create($request->all());

            $response = [
                'message' => 'Pedido created.',
                'data'    => $pedido->toArray(),
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
        $pedido = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pedido,
            ]);
        }

        return view('pedidos.show', compact('pedido'));
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
        $pedido = $this->repository->find($id);

        return view('pedidos.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PedidoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PedidoUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $pedido = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Pedido updated.',
                'data'    => $pedido->toArray(),
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
                'message' => 'Pedido deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Pedido deleted.');
    }
}
