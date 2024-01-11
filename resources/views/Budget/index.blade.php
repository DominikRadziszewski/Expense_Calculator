@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div>
                <img src="{{ asset('storage/Logo.png') }}" alt="Logo" width="110px" height="120px">
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div >Planowany Przychód</div>
        </div>
        <div class="col-md-2">
            <div >Rzeczywisty Przychód</div>
        </div>
        <div class="col-md-2">
            <div >Bilans</div>
        </div>
        <div class="col-md-2">
            <div >Rzeczywiste wydatki</div>
        </div>
        <div class="col-md-2">
            <div >Planowe wydatki</div>
        </div>
    </div>
</div>
@endsection