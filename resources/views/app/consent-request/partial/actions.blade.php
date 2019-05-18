<td class="has-text-right actions">
    <div class="field has-addons is-pulled-right action" style="margin-bottom: 0">
        <p class="control">
            <a class="button is-small is-info tooltip" data-tooltip="View Details" href="{{ url('app/consent-requests/'.$consentRequest->id) }}">
                <i class="fas fa-eye"></i>
            </a>
        </p>
        <p class="control">
            @if($consentRequest->isPatientSigned() && $consentRequest->isUserSigned())
                <a class="button is-small is-secondary tooltip " href="/app/consent-requests/{{ $consentRequest->id }}/download" data-tooltip="Download completed consent" data-id="">
                    <i class="fas fa-file-alt"></i>
                </a>
            @else
                <a class="button is-small is-secondary tooltip " data-tooltip="Download completed consent" data-id="" disabled="">
                    <i class="fas fa-file-alt"></i>
                </a>
            @endif
        </p>
        <p class="control">
            <a class="button is-small is-warning has-text-white tooltip action-edit" data-tooltip="Edit" href="{{ ($consentRequest->video_watched == 1) ? '#' : url('app/consent-requests/'.$consentRequest->id.'/edit') }}" {{ ($consentRequest->video_watched == 1) ? 'disabled="disabled"' : null }}>
                <i class="fas fa-edit"></i>
            </a>
        </p>
        <p class="control">
            @if($consentRequest->isPatientSigned() && !$consentRequest->isUserSigned())
            <a class="button is-small is-success tooltip" data-tooltip="Doctor Complete" href="/app/consent-requests/{{ $consentRequest->id }}/doctor-questions/edit" >
                <i class="fas fa-clipboard-check"></i>
            </a>
            @else
                <a class="button is-small is-success tooltip" data-tooltip="Doctor Complete" href="#" disabled="" >
                    <i class="fas fa-clipboard-check"></i>
                </a>
            @endif
        </p>
        <p class="control">
            <a class="button is-small is-danger tooltip {{ ($consentRequest->video_watched == 1) ?  : 'action-delete delete-button is-small' }} " data-tooltip="Delete" {{ ($consentRequest->video_watched == 1) ? 'disabled="disabled"' : null }} >
                <i class="fas fa-trash"></i>
            </a>
        </p>
    </div>
    <div class="field has-addons is-pulled-right action delete-button is-smalls is-hidden">
        <p class="control">
            <a class="button is-small is-default tooltip control delete-button is-small-cancel is-hidden" data-tooltip="Delete Confirm">
                Cancel
            </a>
        </p>
        <p class="control">
            <a href="{{ url('app/consent-requests/'.$consentRequest->id.'/delete') }}" class="button is-small is-danger has-text-white tooltip delete-button is-small-confirm is-hidden" data-tooltip="Delete Cancel">
                Yes, delete?
            </a>
        </p>
    </div>

</td>