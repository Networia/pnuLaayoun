@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')
    <!-- Kick start -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Input demo 🚀</h4>
        </div>
        <div class="card-body">
            <div class="card-text row">
                {{-- Defult Input --}}
                <x-forms.input />

                {{-- Basic Input --}}
                <x-forms.input label="Basic Input (change att)" name="basic_inp" cols="col-3" id="basic_inp"/>
                <x-forms.input label="Basic Input (change type)" name="basic_inp" cols="col-3" id="basic_inp" type="password" />

                {{-- In Edit Input : :last="$YOU_LAST_DATA", components auto set last data of this input if exest, accept collection --}}
                <x-forms.input label="Edit Input (passed last data )" :last="$last" name="b_n" cols="col-3"/>
            </div>
        </div>
    </div>
    <!--/ Kick start -->
@endsection
