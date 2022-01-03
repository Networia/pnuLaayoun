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
                {{-- htmlname, for change name of element in html (name att use just Use only a default value) --}}
                <x-forms.input label="Basic Input (name html)" htmlname="NH" name="basic_inp" cols="col-3" id="basic_inp"/>
                <x-forms.input label="Basic Input (change att)" name="basic_inp" cols="col-3" id="basic_inp"/>
                <x-forms.input label="Basic Input (change type)" name="basic_inp" cols="col-3" id="basic_inp" type="password" />

                {{-- In Edit Input : :last="$YOU_LAST_DATA", components auto set last data of this input if exest, accept collection --}}
                <x-forms.input label="Edit Input (passed last data )" :last="$last" name="b_n" cols="col-3"/>

                {{-- dataname, for get name of att in $last : $last->b_n_id --}}
                <x-forms.input label="Edit Input (... and Data Name )" :last="$last" dataname="b_n_id" htmlname="b_n" name="b_n" cols="col-3"/>

                {{-- <x-forms.select2 name="test" cols="col-3"/> --}}
                <x-forms.select2 name="test" cols="col-3" :last="$last"/>
            </div>
        </div>
    </div>
    <!--/ Kick start -->
@endsection
