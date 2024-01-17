@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-1">
        <div>
            <img src="{{ asset('storage/Logo.png') }}" alt="Logo" width="110px" height="120px">
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="row justify-content-center">
            <div class="card-body mb-5">
                <chart-component :labels="{{ json_encode($labels) }}" :values="{{ json_encode($values) }}"></chart-component>
            </div>
        </div>
    </div>r
</div>
<div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
</div>
@endsection

@push('scripts')
<script src="{{ mix('js/app.js') }}"></script>
@endpush