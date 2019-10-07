<?php

namespace App\Http\Controllers\Api;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
	 * @var Cliente
	 */
	private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    public function index()
    {
        return response()->json($this->cliente->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            try {
                $productData = $request->all();
                $this->cliente->create($productData);
                $return = ['data' => ['msg' => 'Carro cadastrado com sucesso!']];
                return response()->json($return, 201);
            } catch (\Exception $e) {
                if(config('app.debug')) {
                    return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
                }
                return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de salvar', 1010),  500);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $id)
    {
        $cliente = $this->cliente->find($id);
    	if(! $cliente) return response()->json(ApiError::errorMessage('Produto não encontrado!', 4040), 404);
    	$data = ['data' => $cliente];
	    return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
			$productData = $request->all();
			$cliente     = $this->cliente->find($id);
			$cliente->update($productData);
			$return = ['data' => ['msg' => 'Carro atualizado com sucesso!']];
			return response()->json($return, 201);
		} catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1011),  500);
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de atualizar', 1011), 500);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Cliente $id)
    {
        try {
			$id->delete();
			return response()->json(['data' => ['msg' => 'Carro: ' . $id->nome . ' removido com sucesso!']], 200);
		}catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1012),  500);
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de remover', 1012),  500);
		}
	}
    
}
