<td class="has-text-right actions">
    <div class="field has-addons is-pulled-right action" style="margin-bottom: 0">
        <p class="control">
            <a class="button is-info tooltip" data-tooltip="View Details" href="{{ url('app/consent-requests/'.$consentRequest->id) }}">
                <i class="fas fa-eye"></i>
            </a>
        </p>
        <p class="control">
            <a class="button is-secondary tooltip " data-tooltip="Download" data-id="" disabled="">
                <i class="fas fa-file-alt"></i>
            </a>
        </p>
        <p class="control">
            <a class="button is-warning has-text-white tooltip action-edit" data-tooltip="Edit" href="{{ ($consentRequest->isPatientSigned()) ? '#' : url('app/consent-requests/'.$consentRequest->id.'/edit') }}" {{ ($consentRequest->isPatientSigned()) ? 'disabled="disabled"' : null }}>
                <i class="fas fa-edit"></i>
            </a>
        </p>
        <p class="control">
            <a class="button is-danger tooltip {{ ($consentRequest->isPatientSigned()) ?  : 'action-delete delete-button' }} " data-tooltip="Delete" {{ ($consentRequest->isPatientSigned()) ? 'disabled="disabled"' : null }} >
                <i class="fas fa-trash"></i>
            </a>
        </p>
    </div>
    <div class="field has-addons is-pulled-right action delete-buttons is-hidden">
        <p class="control">
            <a class="button is-default tooltip control delete-button-cancel is-hidden" data-tooltip="Delete Confirm">
                Cancel
            </a>
        </p>
        <p class="control">
            <a href="{{ url('app/consent-requests/'.$consentRequest->id.'/delete') }}" class="button is-danger has-text-white tooltip delete-button-confirm is-hidden" data-tooltip="Delete Cancel">
                Yes, delete?
            </a>
        </p>
    </div>

</td>