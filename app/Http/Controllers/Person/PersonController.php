<?php

namespace App\Http\Controllers\Person;

use App\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PersonController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::all();

        return $this->showAll($people);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields_validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'aliases' => 'required',
        ]);
        
        $person = Person::create($fields_validated);

        return $this->showOne($person, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return $this->showOne($person);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        if($request->has('first_name')) {
            $person->first_name = $request->first_name;
        }
        if($request->has('last_name')) {
            $person->last_name = $request->last_name;
        }

        if($request->has('aliases')) {
            $person->aliases = $request->aliases;
        }

        if(!$person->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $person->save();

        return $this->showOne($person);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->delete();

        return $this->showOne($person);
    }
}
