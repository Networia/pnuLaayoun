@extends('layouts/contentLayoutMaster')

@section('title', __('Nouveau Product'))

@section('vendor-style')
    <!-- vendor css files -->
    {{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}"> --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/form-wizard.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/wizard/bs-stepper.min.css') }}">
@endsection

@section('content')

<!-- Basic Inputs start -->
<section id="basic-input">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Horizontal Wizard -->
            <section class="horizontal-wizard">
                <div class="bs-stepper horizontal-wizard-example linear">
                    <div class="bs-stepper-header">
                        <div class="step active" data-target="#account-details">
                            <button type="button" class="step-trigger" aria-selected="true">
                                <span class="bs-stepper-box">1</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Bonne Details</span>
                                    <span class="bs-stepper-subtitle">Setup bonne Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right font-medium-2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                        <div class="step" data-target="#personal-info">
                            <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                                <span class="bs-stepper-box">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Payement Info</span>
                                    <span class="bs-stepper-subtitle">Add Payement Info</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right font-medium-2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                        <div class="step" data-target="#address-step">
                            <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                                <span class="bs-stepper-box">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Produits</span>
                                    <span class="bs-stepper-subtitle">Add Produis</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <div id="account-details" class="content active dstepper-block">
                            <div class="content-header">
                                <h5 class="mb-0">Bonne Details</h5>
                                <small class="text-muted">Enter Your Bonne Details.</small>
                            </div>
                            <form novalidate="novalidate">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="numero_bone">numero de bone</label>
                                        <input type="text" name="numero_bone" id="numero_bone" class="form-control" placeholder="johndoe">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="supllier">Fornisseur</label>
                                        <input type="text" name="supllier" id="supllier" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-password-toggle col-md-6">
                                        <label class="form-label" for="stock">Stock</label>
                                        <input type="text" name="stock" id="stock" class="form-control" placeholder="stock">
                                    </div>
                                    <div class="form-group form-password-toggle col-md-6">
                                        <label class="form-label" for="total">Total</label>
                                        <input type="text" name="total" id="total" class="form-control" placeholder="total">
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-outline-secondary btn-prev waves-effect" disabled="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left align-middle mr-sm-25 mr-0"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next waves-effect waves-float waves-light">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right align-middle ml-sm-25 ml-0"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </button>
                            </div>
                        </div>
                        <div id="personal-info" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Payement Info</h5>
                                <small>Enter Your Payement Info.</small>
                            </div>
                            <form novalidate="novalidate">
                                {{-- <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="first-name">First Name</label>
                                        <input type="text" name="first-name" id="first-name" class="form-control" placeholder="John">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="last-name">Last Name</label>
                                        <input type="text" name="last-name" id="last-name" class="form-control" placeholder="Doe">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="country">Country</label>
                                        <div class="position-relative"><select class="select2 w-100 select2-hidden-accessible" name="country" id="country" data-select2-id="country" tabindex="-1" aria-hidden="true">
                                            <option label=" " data-select2-id="2"></option>
                                            <option>UK</option>
                                            <option>USA</option>
                                            <option>Spain</option>
                                            <option>France</option>
                                            <option>Italy</option>
                                            <option>Australia</option>
                                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-country-container"><span class="select2-selection__rendered" id="select2-country-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select value</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="language">Language</label>
                                        <div class="position-relative"><select class="select2 w-100 select2-hidden-accessible" name="language" id="language" multiple="" data-select2-id="language" tabindex="-1" aria-hidden="true">
                                            <option>English</option>
                                            <option>French</option>
                                            <option>Spanish</option>
                                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="Select value" style="width: 0px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                                    </div>
                                </div> --}}
                            </form>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary btn-prev waves-effect waves-float waves-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left align-middle mr-sm-25 mr-0"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next waves-effect waves-float waves-light">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right align-middle ml-sm-25 ml-0"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </button>
                            </div>
                        </div>
                        <div id="address-step" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Address</h5>
                                <small>Enter Your Address.</small>
                            </div>
                            <form novalidate="novalidate">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" id="address" name="address" class="form-control" placeholder="98  Borough bridge Road, Birmingham">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="landmark">Landmark</label>
                                        <input type="text" name="landmark" id="landmark" class="form-control" placeholder="Borough bridge">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="pincode1">Pincode</label>
                                        <input type="text" id="pincode1" class="form-control" placeholder="658921">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="city1">City</label>
                                        <input type="text" id="city1" class="form-control" placeholder="Birmingham">
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary btn-prev waves-effect waves-float waves-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left align-middle mr-sm-25 mr-0"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next waves-effect waves-float waves-light">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right align-middle ml-sm-25 ml-0"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </button>
                            </div>
                        </div>
                        <div id="social-links" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Social Links</h5>
                                <small>Enter Your Social Links.</small>
                            </div>
                            <form novalidate="novalidate">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="twitter">Twitter</label>
                                        <input type="text" id="twitter" name="twitter" class="form-control" placeholder="https://twitter.com/abc">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="facebook">Facebook</label>
                                        <input type="text" id="facebook" name="facebook" class="form-control" placeholder="https://facebook.com/abc">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="google">Google+</label>
                                        <input type="text" id="google" name="google" class="form-control" placeholder="https://plus.google.com/abc">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="linkedin">Linkedin</label>
                                        <input type="text" id="linkedin" name="linkedin" class="form-control" placeholder="https://linkedin.com/abc">
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary btn-prev waves-effect waves-float waves-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left align-middle mr-sm-25 mr-0"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-success btn-submit waves-effect waves-float waves-light">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /Horizontal Wizard -->

            
            
            

            
            
            

            
            
            

        </div>
    </div>
</section>
<!-- Basic Inputs end -->
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
    {{-- <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script> --}}
    <!-- vendor files -->
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-tooltip-valid.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
@endsection