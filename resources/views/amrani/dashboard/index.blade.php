@extends('amrani.layout.app')
@section('title') {{ __('Agence Amrani') }} @endsection

@section('content')
    <div class="w-full bg-white flex flex-col">
        <div class="flex items-center justify-between h-12 px-4 text-gray-600 shadow">
            <h1 class="font-bold text-xl">Dashboard</h1>
        </div>

        @include('amrani.dashboard.partials.menu')


        <div class="flex flex-col gap-4 px-4 py-4 overflow-auto bg-gray-50">

            <div class="flex flex-row">
                <div class="w-1/2">
                    @include('amrani.dashboard.charts.bars')
                </div>
                <div class="w-1/2">
                    @include('amrani.dashboard.charts.pie')
                </div>
                
            </div>
            
            <div class="">
                    @include('amrani.dashboard.partials.logs')
            </div>  
            
        </div>
    </div>
@endsection