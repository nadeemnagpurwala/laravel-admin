<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variable;

class VariableController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variables = Variable::all();
        return view('variable.index', compact('variables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('variable.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'variable_name' => ['required', 'string', 'max:255'],
            'variable_code' => ['required', 'string', 'max:255', 'unique:variables']
        ]);

        $postData = new Variable([
            'variable_name' => $request->get('variable_name'),
            'variable_code' => $request->get('variable_code'),
            'variable_plain_value' => $request->get('variable_plain_value'),
            'variable_html_value' => $request->get('variable_html_value')
        ]);
        $postData->save();

        return redirect('/variable-configuration')->with('success', 'Variable saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $variable = Variable::find($id);
        return view('variable.edit', compact('variable'));
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
        $request->validate([
            'variable_name' => ['required', 'string', 'max:255'],
            'variable_code' => ['required', 'string', 'max:255', 'unique:variables']
        ]);

        $variable = Variable::find($id);
        $variable->variable_name =  $request->get('variable_name');
        $variable->variable_code = $request->get('variable_code');
        $variable->variable_plain_value = $request->get('variable_plain_value');
        $variable->variable_html_value = $request->get('variable_html_value');
        $variable->save();

        return redirect('/variable-configuration')->with('success', 'Variable updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variable = Variable::find($id);
        $variable->delete();
        
        return redirect('/variable-configuration')->with('success', 'Variable deleted successfully');
    }
}
