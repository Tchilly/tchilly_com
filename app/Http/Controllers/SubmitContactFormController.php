<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitContactFormRequest;
use App\Mail\ContactFormSubmitted;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class SubmitContactFormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param SubmitContactFormRequest $request
     * @return RedirectResponse
     */
    public function __invoke(SubmitContactFormRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Mail::to('admin@tchilly.com')->send(new ContactFormSubmitted($validated));

        session()->flash('flash.banner', 'Contact form successfully sent!');
        session()->flash('flash.bannerStyle', 'success');

        return back();
    }
}
