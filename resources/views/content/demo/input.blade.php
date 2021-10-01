@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')
    <!-- Kick start -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Input demo 🚀</h4>
        </div>
        <div class="card-body">
            <div class="card-text">
                <x-forms.input label="Basic Input" name="b_n" />
            </div>
        </div>
    </div>
    <!--/ Kick start -->
@endsection
