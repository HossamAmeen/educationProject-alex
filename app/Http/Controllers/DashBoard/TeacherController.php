<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
class TeacherController extends CRUDController
{
    public function __construct(Teacher $model)
    {
        $this->model = $model;
    }

}
