<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Http\Requests\ProfissionalUpdateFormRequest;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfissionalController extends Controller
{
    public function store(ProfissionalFormRequest $request)
    {

        $profissional = Profissional::create([


            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->complemento,
            'password' => Hash::make($request->password),
          


        ]);
        if (isset($profissional)) {
            return response()->json([
                "status" => true,
                'title' => 'Cadastrado',
                "message" => "Cliente Cadastrado com sucesso",
                "data" => $profissional

            ], 200);
        }

       
    }
    public function excluir($id){
        $profissional = Profissional::find($id);
    
        if(!isset($profissional)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encotrado"
            ]);
        }
    
        $profissional->delete();
    
        return response()->json([
            'status' => true,
            'message' => "Cadastro excluido com sucesso"
        ]);
    }


    public function retornarTodos()
    {
        $profissional = Profissional::all();

        if (count($profissional) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => "Nenhum cliente Registrado"
        ]);
    }


   


    public function editarProfissional(ProfissionalUpdateFormRequest $request)
    {
        $profissional = Profissional::find($request->id);
        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }

        if (isset($request->nome)) {
            $profissional->nome = $request->nome;
        }

        if (isset($request->celular)) {
            $profissional->celular = $request->celular;
        }
        if (isset($request->email)) {
            $profissional->email = $request->email;
        }
        if (isset($request->cpf)) {
            $profissional->cpf = $request->cpf;
        }
        if (isset($request->dataNascimento)) {
            $profissional->dataNascimento = $request->dataNascimento;
        }
        if (isset($request->cidade)) {
            $profissional->cidade = $request->cidade;
        }
        if (isset($request->estado)) {
            $profissional->estado = $request->estado;
        }
        if (isset($request->pais)) {
            $profissional->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $profissional->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $profissional->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $profissional->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $profissional->cep = $request->cep;
        }
        if (isset($request->complemento)) {
            $profissional->complemento = $request->complemento;
        }
        if (isset($request->password)) {
            $profissional->password = $request->password;
        }
      




        $profissional->update();

        return response()->json([
            'status' => true,
            'message' => 'Profissional atualizado.'
        ]);
    }

//Pesquisas
   
    public function pesquisarPorNome(Request $request)
    {
        $profissional = Profissional::where('nome', 'like', '%' . $request->nome . '%')->get();



        if (count($profissional) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => "Nome não encontrado"
        ]);
    }



    public function pesquisarPorCpf(Request $request)
    {
        $profissional = Profissional::where('cpf', '=', $request->cpf)->first();



        if (isset($profissional)) {
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => "CPF não encontrado"
        ]);
    }
    public function update(Request $request){
        $profissional = Profissional::find($request->id);
    
        if(!isset($profissional)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encontrado"
            ]);
        }
    
        if(isset($request->nome)){
            $profissional->nome = $request->nome;
        }
        if(isset($request->celular)){
            $profissional->celular= $request->celular;
        }
        if(isset($request->email)){
            $profissional->email = $request->email;
        }
        if(isset($request->cpf)){
            $profissional->cpf = $request->cpf;
        }
        if(isset($request->dataNascimento)){
            $profissional->dataNascimento = $request->dataNascimento;
        }
        if(isset($request->cidade)){
            $profissional->cidade = $request->cidade;
        }
        if(isset($request->estado)){
            $profissional->estado = $request->estado;
        }
        if(isset($request->pais)){
            $profissional->pais = $request->pais;
        }
        if(isset($request->rua)){
            $profissional->rua = $request->rua;
        }
        if(isset($request->numero)){
            $profissional->numero = $request->numero;
        }
        if(isset($request->bairro)){
            $profissional->bairro = $request->bairro;
        }
        if(isset($request->cep)){
            $profissional->cep = $request->cep;
        }
        if(isset($request->complemento)){
            $profissional->complemento = $request->complemento;
        }
        if(isset($request->senha)){
            $profissional->senha = $request->senha;
        }
        if(isset($request->salario)){
            $profissional->salario = $request->salario;
        }
        $profissional-> update();
    
        return response()->json([
            'status' => true,
            'message' => "Cadastro atualizado"
        ]);
    
    }

   
    
}

