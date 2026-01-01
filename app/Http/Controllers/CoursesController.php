<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;






class CoursesController extends Controller
{
    // Listar os cursos
    public function index()
    {
        // dd("Carregar os cursos");
        return view('courses.index');
    }
}
