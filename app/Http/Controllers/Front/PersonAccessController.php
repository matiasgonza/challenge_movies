<?php

namespace App\Http\Controllers\Front;

use App\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PersonAccessController extends ApiController
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return $this->showOne($person);
    }
}
