<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCase;

class StudentCaseController extends Controller
{
    public function searchStudentCases(Request $request)
    {
        if ($request->has('subject_id')) {
            $query->where('subject_id', $request->subject_id);
            
        }

        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }


        $studentCases = $query->get();
        response()->json($studentCases);


    }
}