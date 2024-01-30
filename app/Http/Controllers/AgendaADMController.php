<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaADMFormRequest;
use App\Models\ADM_Horario;
use App\Models\AgendaADM;
use App\Models\AgendaProfissional;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgendaADMController extends Controller
{
    public function store(AgendaADMFormRequest $request)
    {

        $dataAtual = Carbon::now('America/Sao_Paulo');

        $data_hora = Carbon::parse($request->data_hora);

        if ($dataAtual->gt($data_hora)) {
            return response()->json([
                "status" => false,
                "error" => ["A data e hora devem ser posteriores ao dia de hoje."]
            ], 400);
        }
     



        $ADM_Horario = AgendaADM::find($request->profissional_id);

        if (!$ADM_Horario) {
            return response()->json([
                "status" => false,
                "message" => "Profissional não encontrado"
            ], 400);
        }

        $agendaExistente = AgendaADM::where('profissional_id', $request->profissional_id)
            ->where('data_hora', $data_hora)
            ->first();

        if ($agendaExistente) {
            return response()->json([
                "status" => false,
                "message" => "Já existe uma agenda cadastrada para essa data e profissional."
            ], 400);
        }


        $agenda = AgendaADM::create([


            'profissional_id' => $request->profissional_id,
            'cliente_id' => $request->cliente_id,
            'servico_id' => $request->servico_id,
            'data_hora' => $request->data_hora,
            'pagamento' => $request->pagamento,
            'valor' => $request->valor,



        ]);
        return response()->json([
            "status" => true,
            "message" => "Agenda Cadastrada com sucesso",
            "data" => $agenda

        ], 200);
    }





    public function pesquisarPorData(Request $request)
    {


        $agenda = AgendaADM::where('data_hora', 'like', '%' . $request->data_hora . '%')->get();


        if (count($agenda) > 0) {
            return response()->json([
                'status' => true,
                'data' => $agenda
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => "Data não encontada"
        ]);
    }



    public function pesquisarAgendaPorId(Request $request)
    {
        $agenda = AgendaADM::where('profissional_id', 'like', '%' . $request->profissional_id . '%')->get();

        if (count($agenda) > 0) {
            return response()->json([
                'status' => true,
                'data' => $agenda
            ]);
        }




        return response()->json([
            'status' => false,
            'data' => 'Profissional não disponivel'
        ]);
    }







    public function retornarTodosAgenda()
    {
        $agenda = AgendaADM::all();

        if (count($agenda) > 0) {
            return response()->json([
                'status' => true,
                'data' => $agenda
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Nenhum registro no sistema'
        ]);
    }


    public function excluirAgenda($id)
    {
        $agenda = AgendaADM::find($id);

        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => "Agenda não encontrada"
            ]);
        }

        $agenda->delete();
        return response()->json([
            'status' => true,
            'message' => "Agenda excluido com sucessa"
        ]);
    }

    public function editarAgenda(Request $request)
    {
        $agenda = AgendaADM::find($request->id);
       

        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => "Agenda não encontrado"
            ]);
        }

        $dataAtual = Carbon::now('America/Sao_Paulo');

        $data_hora = Carbon::parse($request->data_hora);

        if ($dataAtual->gt($data_hora)) {
            return response()->json([
                "status" => false,
                "error" => ["A data e hora devem ser posteriores ao dia de hoje."]
            ], 400);
        }




        if (isset($request->profissional_id)) {
            $agenda->profissional_id = $request->profissional_id;
        }
        if (isset($request->data_hora)) {
            $agenda->data_hora = $request->data_hora;
        }

        if (isset($request->cliente_id)) {
            $agenda->cliente_id = $request->cliente_id;
        }
        if (isset($request->pagamento)) {
            $agenda->pagamento = $request->pagamento;
        }
        if (isset($request->valor)) {
            $agenda->valor = $request->valor;
        }

        $agenda->update();

        return response()->json([
            'status' => true,
            'message' => 'Agenda atualizada.'
        ]);
    }

    public function pesquisarPorId($id)
    {
        $agenda = AgendaADM::find($id);

        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => "Agenda não cadastrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $agenda
        ]);
    }
}  





