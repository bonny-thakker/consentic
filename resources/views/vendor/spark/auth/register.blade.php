@if (Spark::billsUsingStripe())

    @if(Session::has('coupon'))
        @include('spark::auth.register-coupon')
    @else
        @include('spark::auth.register-stripe')
    @endif

@else
    @include('spark::auth.register-braintree')
@endif

<!-- Terms Modal -->
<div class="modal fade" id="modal-terms" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">
                    Terms and Conditions
                </h5>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                @include('web.partial.terms', [
                    'hideTitle' => true
                ])
            </div>

            <!-- Modal Actions -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Privacy Modal -->
<div class="modal fade" id="modal-privacy" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">
                    Privacy Policy
                </h5>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                @include('web.partial.privacy', [
                    'hideTitle' => true
                ])
            </div>

            <!-- Modal Actions -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


