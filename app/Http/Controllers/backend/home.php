<?php

namespace App\Http\Controllers\backend;
use App\models\User;


class home extends backendController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    //
    public function index() {
        return view('back_end.home');
    }
}
