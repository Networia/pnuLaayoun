@extends('layouts/contentLayoutMaster')

@section('title', __('Nouveau Product'))

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
     <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/form-wizard.css') }}">
@endsection

@section('content')

<!-- Basic Inputs start -->
<section id="basic-input">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Horizontal Wizard -->
            <section class="modern-horizontal-wizard">
                <div class="bs-stepper wizard-modern modern-wizard-example">
                  <div class="bs-stepper-header">
                    <div class="step" data-target="#account-details-modern">
                      <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">
                          <i data-feather="file-text" class="font-medium-3"></i>
                        </span>
                        <span class="bs-stepper-label">
                          <span class="bs-stepper-title">Bone Details</span>
                          <span class="bs-stepper-subtitle">Setup Bone Details</span>
                        </span>
                      </button>
                    </div>
                    <div class="line">
                      <i data-feather="chevron-right" class="font-medium-2"></i>
                    </div>
                    <div class="step" data-target="#personal-info-modern">
                      <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">
                          <i data-feather="user" class="font-medium-3"></i>
                        </span>
                        <span class="bs-stepper-label">
                          <span class="bs-stepper-title">Payement Info</span>
                          <span class="bs-stepper-subtitle">Add Payement Info</span>
                        </span>
                      </button>
                    </div>
                    <div class="line">
                      <i data-feather="chevron-right" class="font-medium-2"></i>
                    </div>
                    <div class="step" data-target="#address-step-modern">
                      <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">
                          <i data-feather="map-pin" class="font-medium-3"></i>
                        </span>
                        <span class="bs-stepper-label">
                          <span class="bs-stepper-title">Produits</span>
                          <span class="bs-stepper-subtitle">Add Produits</span>
                        </span>
                      </button>
                    </div>
                    
                  </div>
                  <div class="bs-stepper-content">
                    {{-- BONNE INFO --}}
                    <div id="account-details-modern" class="content">
                      <div class="content-header">
                        <h5 class="mb-0">Bone Details</h5>
                        <small class="text-muted">Enter Your Bone Details.</small>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label class="form-label" for="modern-username">serie de bone</label>
                          <input type="text" id="modern-username" class="form-control" placeholder="johndoe" />
                        </div>
                        <div class="form-group col-md-6">
                          <label class="form-label" for="language">Fornisseur</label>
                          <select class="select2 w-100" name="language" id="fornisseur" multiple>
                            <option>English</option>
                            <option>French</option>
                            <option>Spanish</option>
                          </select>
                          </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label class="form-label" for="modern-country">stock</label>
                          <select class="select2 w-100" id="stock">
                            <option label=" "></option>
                            <option>UK</option>
                            <option>USA</option>
                            <option>Spain</option>
                            <option>France</option>
                            <option>Italy</option>
                            <option>Australia</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="modern-username">Total</label>
                            <input type="text" id="modern-username" class="form-control" placeholder="johndoe" />
                          </div>
                      </div>
                      <div class="d-flex justify-content-between">
                        <button class="btn btn-outline-secondary btn-prev" disabled>
                          <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                          <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next">
                          <span class="align-middle d-sm-inline-block d-none">Next</span>
                          <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                        </button>
                      </div>
                    </div>
                    {{-- pAYEMENT INFO --}}
                    <div id="personal-info-modern" class="content">
                      <div class="content-header d-flex justify-content-between">
                        <div class="row">
                            <h5 class="mb-0">Payement Info</h5>
                            <small>Enter Your Payement Info.</small>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-icon btn-primary addrep" type="button">
                                    <i data-feather="plus" class="mr-25"></i>
                                    <span>Add New</span>
                                </button>
                            </div>           
                         </div>
                      </div>
                      {{-- <div class="row">
                        <form action="#" class="invoice-repeater">
                            <div data-repeater-list="invoice">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="modern-country">type</label>
                                                    <select class="select2 w-100" id="modern-country">
                                                        <option label=" "></option>
                                                        <option>cheque</option>
                                                        <option>traite</option>
                                                        <option>cash</option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="itemcost">serie</label>
                                                <input type="number" class="form-control" id="itemcost" aria-describedby="itemcost" placeholder="4536353673.." />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="itemquantity">Montent</label>
                                                <input type="number" class="form-control" id="itemquantity" aria-describedby="itemquantity" placeholder="1" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 mb-50">
                                            <div class="form-group">
                                                <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                    <i data-feather="x" class="mr-25"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    
                                </div>
                            </div>

                        </form>
                      </div> --}}
                      
                        <div class="row">
                          <!-- Invoice repeater -->
                          <div class="col-12">
                              <div class="card-body">
                                <form action="#" class="invoice-repeater">
                                  <div data-repeater-list="invoice">
                                    <div data-repeater-item>
                                      <div class="row d-flex align-items-end">
                                        <div class="col-md-4 col-12">
                                          <div class="form-group">
                                            <label class="form-label" for="modern-country">Type de payement</label>
                                            <select class="select2 w-100" id="modern-country">
                                              <option label=" "></option>
                                              <option>Cheque</option>
                                              <option>traite</option>
                                              <option>cash</option>
                                            </select>
                                        </div>
                                        </div>
                      
                                        <div class="col-md-4 col-12">
                                          <div class="form-group">
                                            <label for="itemcost">serie</label>
                                            <input
                                              type="number"
                                              class="form-control"
                                              id="itemcost"
                                              aria-describedby="itemcost"
                                              placeholder="32"
                                            />
                                          </div>
                                        </div>
                      
                                        <div class="col-md-2 col-12">
                                          <div class="form-group">
                                            <label for="itemquantity">Montent</label>
                                            <input
                                              type="number"
                                              class="form-control"
                                              id="itemquantity"
                                              aria-describedby="itemquantity"
                                              placeholder="1"
                                            />
                                          </div>
                                        </div>
                      
                                        <div class="col-md-2 col-12 mb-50">
                                          <div class="form-group">
                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                              <i data-feather="x" class="mr-25"></i>
                                              <span>Delete</span>
                                            </button>
                                          </div>
                                        </div>
                                      </div>
                                      <hr />
                                    </div>
                                  </div>
                                  <div class="row" hidden>
                                    <div class="col-12">
                                      <button class="btn btn-icon btn-primary " type="button" data-repeater-create id="add_payement">
                                        <i data-feather="plus" class="mr-25"></i>
                                        <span>Add New</span>
                                      </button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                          </div>
                          <!-- /Invoice repeater -->
                        </div>
                      <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev">
                          <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                          <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next">
                          <span class="align-middle d-sm-inline-block d-none">Next</span>
                          <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                        </button>
                      </div>
                    </div>
                    {{-- PRODUTS INFO --}}
                    <div id="address-step-modern" class="content">
                      <div class="content-header">
                        <h5 class="mb-0">Produits</h5>
                        <small>Enter Your Produits.</small>
                      </div>
                      {{-- Pnu --}}
                      <div>
                        <div class="row">
                          <div class="col-12">
                            <div class="card-body">
                              <form action="#" class="invoice-repeater">
                                <div data-repeater-list="invoice">
                                  <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                      <div class="col-md-4 col-12">
                                        <div class="form-group">
                                          <label class="form-label" for="modern-country">Serie Pnu</label>
                                          {{-- <x-forms.select2 label="Série" name="serie" htmlname="serie" dataobject="serie" dataname="name" datavalue="id" cols="col-xl-3 col-md-6 mb-1" /> --}}
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemcost"
                                            aria-describedby="itemcost"
                                            placeholder="32"
                                          />
                                      </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemcost">Mark Pnu</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemcost"
                                            aria-describedby="itemcost"
                                            placeholder="32"
                                          />
                                        </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemquantity">Prix Achat</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemquantity"
                                            aria-describedby="itemquantity"
                                            placeholder="1"
                                          />
                                        </div>
                                      </div>
  
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemquantity">Quantity</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemquantity"
                                            aria-describedby="itemquantity"
                                            placeholder="1"
                                          />
                                        </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12 mb-50">
                                        <div class="form-group">
                                          <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                            <i data-feather="x" class="mr-25"></i>
                                            <span>Delete</span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                    <hr />
                                  </div>
                                </div>
                                <div class="row" >
                                  <div class="col-12 button_center">
                                    <button class="btn btn-icon btn-primary " type="button" data-repeater-create>
                                      <i data-feather="plus" class="mr-25"></i>
                                      <span>Add Pnu</span>
                                    </button>
                                  </div>
                                </div>
                              </form>
                            </div>
                        </div>
                      </div>
                      
                      {{-- Chambrer --}}
                      <div>
                        <div class="row">
                          <div class="col-12">
                            <div class="card-body">
                              <form action="#" class="invoice-repeater">
                                <div data-repeater-list="invoice">
                                  <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                      <div class="col-md-4 col-12">
                                        <div class="form-group">
                                          <label class="form-label" for="modern-country">Serie Chambrer</label>
                                          {{-- <x-forms.select2 label="Série" name="serie" htmlname="serie" dataobject="serie" dataname="name" datavalue="id" cols="col-xl-3 col-md-6 mb-1" /> --}}
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemcost"
                                            aria-describedby="itemcost"
                                            placeholder="32"
                                          />
                                      </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemcost">Mark chambrer</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemcost"
                                            aria-describedby="itemcost"
                                            placeholder="32"
                                          />
                                        </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemquantity">Prix Achat</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemquantity"
                                            aria-describedby="itemquantity"
                                            placeholder="1"
                                          />
                                        </div>
                                      </div>
  
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemquantity">Quantity</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemquantity"
                                            aria-describedby="itemquantity"
                                            placeholder="1"
                                          />
                                        </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12 mb-50">
                                        <div class="form-group">
                                          <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                            <i data-feather="x" class="mr-25"></i>
                                            <span>Delete</span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                    <hr />
                                  </div>
                                </div>
                                <div class="row" >
                                  <div class="col-12 button_center">
                                    <button class="btn btn-icon btn-primary " type="button" data-repeater-create>
                                      <i data-feather="plus" class="mr-25"></i>
                                      <span>Add Chambrer</span>
                                    </button>
                                  </div>
                                </div>
                              </form>
                            </div>
                        </div>
                      </div>

                      {{-- Filter --}}
                      <div>
                        <div class="row">
                          <div class="col-12">
                            <div class="card-body">
                              <form action="#" class="invoice-repeater">
                                <div data-repeater-list="invoice">
                                  <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                      <div class="col-md-4 col-12">
                                        <div class="form-group">
                                          <label class="form-label" for="modern-country">Reference filter</label>
                                          {{-- <x-forms.select2 label="Série" name="serie" htmlname="serie" dataobject="serie" dataname="name" datavalue="id" cols="col-xl-3 col-md-6 mb-1" /> --}}
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemcost"
                                            aria-describedby="itemcost"
                                            placeholder="32"
                                          />
                                      </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemcost">Mark Filter</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemcost"
                                            aria-describedby="itemcost"
                                            placeholder="32"
                                          />
                                        </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemquantity">Prix Achat</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemquantity"
                                            aria-describedby="itemquantity"
                                            placeholder="1"
                                          />
                                        </div>
                                      </div>
  
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemquantity">Quantity</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemquantity"
                                            aria-describedby="itemquantity"
                                            placeholder="1"
                                          />
                                        </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12 mb-50">
                                        <div class="form-group">
                                          <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                            <i data-feather="x" class="mr-25"></i>
                                            <span>Delete</span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                    <hr />
                                  </div>
                                </div>
                                <div class="row" >
                                  <div class="col-12 button_center">
                                    <button class="btn btn-icon btn-primary " type="button" data-repeater-create>
                                      <i data-feather="plus" class="mr-25"></i>
                                      <span>Add filter</span>
                                    </button>
                                  </div>
                                </div>
                              </form>
                            </div>
                        </div>
                      </div>

                      {{-- Battrie --}}
                      <div>
                        <div class="row">
                          <div class="col-12">
                            <div class="card-body">
                              <form action="#" class="invoice-repeater">
                                <div data-repeater-list="invoice">
                                  <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                      <div class="col-md-4 col-12">
                                        <div class="form-group">
                                          <label class="form-label" for="modern-country">Marque Battrie</label>
                                          {{-- <x-forms.select2 label="Série" name="serie" htmlname="serie" dataobject="serie" dataname="name" datavalue="id" cols="col-xl-3 col-md-6 mb-1" /> --}}
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemcost"
                                            aria-describedby="itemcost"
                                            placeholder="32"
                                          />
                                      </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemcost">Voltage</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemcost"
                                            aria-describedby="itemcost"
                                            placeholder="32"
                                          />
                                        </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemquantity">Prix Achat</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemquantity"
                                            aria-describedby="itemquantity"
                                            placeholder="1"
                                          />
                                        </div>
                                      </div>
  
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemquantity">Quantity</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemquantity"
                                            aria-describedby="itemquantity"
                                            placeholder="1"
                                          />
                                        </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12 mb-50">
                                        <div class="form-group">
                                          <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                            <i data-feather="x" class="mr-25"></i>
                                            <span>Delete</span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                    <hr />
                                  </div>
                                </div>
                                <div class="row" >
                                  <div class="col-12 button_center">
                                    <button class="btn btn-icon btn-primary " type="button" data-repeater-create>
                                      <i data-feather="plus" class="mr-25"></i>
                                      <span>Add Battrie</span>
                                    </button>
                                  </div>
                                </div>
                              </form>
                            </div>
                        </div>
                      </div>

                      {{-- Oil --}}
                      <div>
                        <div class="row">
                          <div class="col-12">
                            <div class="card-body">
                              <form action="#" class="invoice-repeater">
                                <div data-repeater-list="invoice">
                                  <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label class="form-label" for="modern-country">Marque oil</label>
                                          {{-- <x-forms.select2 label="Série" name="serie" htmlname="serie" dataobject="serie" dataname="name" datavalue="id" cols="col-xl-3 col-md-6 mb-1" /> --}}
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemcost"
                                            aria-describedby="itemcost"
                                            placeholder="32"
                                          />
                                      </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemcost">Serie oil</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemcost"
                                            aria-describedby="itemcost"
                                            placeholder="32"
                                          />
                                        </div>
                                      </div>

                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemcost">Lettrage oil</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemcost"
                                            aria-describedby="itemcost"
                                            placeholder="32"
                                          />
                                        </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemquantity">Prix Achat</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemquantity"
                                            aria-describedby="itemquantity"
                                            placeholder="1"
                                          />
                                        </div>
                                      </div>
  
                                      <div class="col-md-2 col-12">
                                        <div class="form-group">
                                          <label for="itemquantity">Quantity</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="itemquantity"
                                            aria-describedby="itemquantity"
                                            placeholder="1"
                                          />
                                        </div>
                                      </div>
                    
                                      <div class="col-md-2 col-12 mb-50">
                                        <div class="form-group">
                                          <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                            <i data-feather="x" class="mr-25"></i>
                                            <span>Delete</span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                    <hr />
                                  </div>
                                </div>
                                <div class="row" >
                                  <div class="col-12 button_center">
                                    <button class="btn btn-icon btn-primary " type="button" data-repeater-create>
                                      <i data-feather="plus" class="mr-25"></i>
                                      <span>Add Battrie</span>
                                    </button>
                                  </div>
                                </div>
                              </form>
                            </div>
                        </div>
                      </div>
                    </div>

                    
                      
                      <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev">
                          <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                          <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next">
                          <span class="align-middle d-sm-inline-block d-none">Next</span>
                          <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                        </button>
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
    <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <!-- vendor files -->
@endsection

@section('page-script')
    <!-- Page js files -->
    {{-- <script src="{{ asset(mix('js/scripts/forms/form-tooltip-valid.js')) }}"></script> --}}
    <script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
@endsection