<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CourseController extends BaseController
{
    public function list(){
        $course = Course::all();
        
    }
}
