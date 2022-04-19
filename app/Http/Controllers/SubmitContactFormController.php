<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitContactFormRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubmitContactFormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param SubmitContactFormRequest $request
     * @return Response
     */
    public function __invoke(SubmitContactFormRequest $request)
    {
        $validated = $request->validated();

        dd($validated);
    }
}
