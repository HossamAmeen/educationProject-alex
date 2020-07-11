<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends CRUDController
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
