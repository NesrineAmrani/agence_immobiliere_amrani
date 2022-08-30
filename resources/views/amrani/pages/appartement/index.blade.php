@extends('amrani.layout.app')
@section('title') {{ __('Gestion des Appartements') }} @endsection

@section('content')
    <div class="w-full h-full bg-gray-100">
        <div class="flex items-center justify-between h-12 px-4 text-gray-600 bg-white">
            <h1 class="font-bold text-xl">{{ __('Gestion des Appartements') }} </h1>
        </div>

        @include('amrani.pages.appartement.partials.table')

    </div>
@endsection