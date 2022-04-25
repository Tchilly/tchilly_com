@component('mail::message')
    # Contact form

    From: {{ "{$contact->last_name}, {$contact->first_name}" }}
    Email: {{ $contact->email }}
    Phone: {{ $contact->phone ?? 'N/A'}}
    Company: {{ $contact->company ?? 'N/A'}}

    {{ $contact-> description }}


    Referral: {{ $contact-> reference ?? 'N/A' }}

@endcomponent
