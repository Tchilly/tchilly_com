<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitContactFormRequest;
use App\Mail\ContactFormSubmitted;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
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

        try {
            Mail::send(new ContactFormSubmitted($validated));
        } catch (Exception $exception) {

            Log::error('Unable to send email', [$validated, $exception]);

            session()->flash('flash.banner', 'Sorry, we could not send the email! I´ve notified the master, and logged the email address.');
            session()->flash('flash.bannerStyle', 'danger');

            return back();

        }

        session()->flash('flash.banner', 'Thank you! The form has been submitted.');
        session()->flash('flash.bannerStyle', 'success');

        return back();
    }
}
