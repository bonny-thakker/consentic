<tr>
    <td>{{ $consentRequest->created_at->format('d/m/Y') }}</td>
    <td>{{ $consentRequest->patient->fullName() }}</td>
    <td>{{ $consentRequest->consent->name }}
        @if($consentRequest->datetime)
            <small><br />{{ \Carbon\Carbon::parse($consentRequest->datetime)->format('l dS F Y') }}</small>
        @endif
        <br /><small>{{ $consentRequest->consent->consentType->name }}</small>

    </td>
    <td>
        @if($consentRequest->in_office == 1)
            <a href="/app/consent-requests/{{ $consentRequest->id }}/office">Office</a>
        @else
            Email
        @endif
    </td>
    <td class="has-text-centered">
        @if($consentRequest->video_watched)
            <span class="icon has-text-success">
                                        <i class="mdi mdi-24px mdi-check-circle"></i>
                                    </span>
        @else
            <span class="icon has-text-danger">
                                        <i class="mdi mdi-24px mdi-close-circle"></i>
                                    </span>
        @endif
    </td>
    <td class="has-text-centered">
        @if($consentRequest->hasPatientAnsweredCorrectly())
            <span class="icon has-text-success">
                                        <i class="mdi mdi-24px mdi-check-circle"></i>
                                    </span>
        @else
            <span class="icon has-text-danger">
                                        <i class="mdi mdi-24px mdi-close-circle"></i>
                                    </span>
        @endif
    </td>
    <td class="has-text-centered">
        @if($consentRequest->patient_signed_ts)
            <span class="icon has-text-success">
                                        <i class="mdi mdi-24px mdi-check-circle"></i>
                                    </span>
        @else
            <span class="icon has-text-danger">
                                        <i class="mdi mdi-24px mdi-close-circle"></i>
                                    </span>
        @endif
    </td>
    <td class="has-text-centered">
        @if($consentRequest->user_signed_ts)
            <span class="icon has-text-success">
                                        <i class="mdi mdi-24px mdi-check-circle"></i>
                                    </span>
        @else
            <span class="icon has-text-danger">
                                        <i class="mdi mdi-24px mdi-close-circle"></i>
                                    </span>
        @endif
    </td>
    @include('app.consent-request.partial.actions', [
        'consentRequest' => $consentRequest
    ])
</tr>