<?php

namespace App\Http\Controllers;

use App\Evaluation;
use App\ExtraQuestionnaireItem;
use App\Response;
use App\StandardQuestionnaireItem;
use App\Student;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responses = Response::all();

        return view('response\index', [
            'responses' => $responses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $responses = Response::all();
        $evaluations = Evaluation::all();
        $students = Student::all();
        $standardquestions = StandardQuestionnaireItem::all();
        $extraquestions = ExtraQuestionnaireItem::all();

        return view('response\create', [
            'responses' => $responses,
            'evaluations' => $evaluations,
            'students' => $students,
            'standardquestions' => $standardquestions,
            'extraquestions' => $extraquestions
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        //dd($input);
        for ($cont = 2; $cont <= count($input['response'])+1; $cont++) {
            $data = [
                'evaluation_id' => $input['evaluation_id'],
                'standard_questionnaire_item_id' => $input['standard_questionnaire_item_id'][$cont],
                'student_id' => $input['student_id'],
                'response' => $input['response'][$cont]
            ];

            Response::create($data);
        }

        return redirect()->route('response.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$response = Response::find($id)) {
            return redirect()->back();
        };
        
        return view('response.show', [
            'response' => $response
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$response = Response::find($id)) {
            return redirect()->back();
        };

        $response->delete();

        return redirect()->route('response.index');
    }
}
