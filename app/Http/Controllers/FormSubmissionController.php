<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormSubmissionRequest;
use App\Models\FormSubmission;
use Illuminate\Http\Request;

class FormSubmissionController extends Controller
{
    public function store(FormSubmissionRequest $request)
    {
        $submission = FormSubmission::create([
            'name' => $request->name,
            'identity_number' => $request->identityNumber,
            'email' => $request->email,
            'date_of_birth' => $request->dob,
        ]);

        return response()->json($submission, 201);
    }
}
