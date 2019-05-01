@extends('spark::layouts.app')

@section('content')
<spark-register-coupon inline-template>
    <div>
        <div class="spark-screen container">
            <!-- Common Register Form Contents -->
            @include('spark::auth.register-common-coupon')
        </div>
    </div>
</spark-register-coupon>
@endsection
