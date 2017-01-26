@extends('layouts.app')

@section('content')
<?php 
    $countries = Countries::all(); 
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Manage My Routines</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group branch_location">
                          <label for="branch_location" class="col-md-3 control-label">Delivery Destination:</label>
                          <div class="col-md-3">
                            <select name="branch_location[country]" id="branch_location_country" class="form-control countries" required="required">
                                <option value="">Select Country</option>
                               @foreach($countries as $country) 
                                  <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-md-3">
                               <select name="branch_location[]" id="branch_location_state" class="form-control states" required="required">
                                          <option value="">Select State/Province</option>
                                      </select>
                          </div>
                          <div class="col-md-3">
                               <select name="branch_location_city" class="form-control cities" required="required">
                                          <option value="">Select City</option>
                                      </select>
                          </div>
                          <div class="col-lg-3 col-lg-offset-3">
                                <input id="branch_location_street" type="text" class="form-control" name="branch_location[]" required placeholder="Street/Road/Ave Name">
                            </div>
                            <div class="col-lg-3">
                            <input id="branch_location_street" type="text" class="form-control" name="branch_location[]" required placeholder="Suite Number">
                          </div>
                          <div class="col-lg-3">
                            <input id="branch_location_street" type="text" class="form-control" name="branch_location[]" required placeholder="Postal Code">
                          </div>
                          <div class="col-lg-offset-3 btn" style="position: relative; margin-top: 10px;">
                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">City Area</button>
                                <ul class="dropdown-menu" style="min-width: 100px;">
                                  <li><a href="#" class="small" data-value="option1" tabIndex="-1">East<input type="checkbox"/ class="pull-right"></a></li>
                                  <li><a href="#" class="small" data-value="option2" tabIndex="-1">South<input type="checkbox"/ class="pull-right"></a></li>
                                  <li><a href="#" class="small" data-value="option3" tabIndex="-1">West<input type="checkbox"/ class="pull-right"></a></li>
                                  <li><a href="#" class="small" data-value="option4" tabIndex="-1">North<input type="checkbox"/ class="pull-right"></a></li>
                                  <li><a href="#" class="small" data-value="option5" tabIndex="-1">Center<input type="checkbox"/ class="pull-right"></a></li>
                                </ul>
                                  </div>
                          <p class="col-sm-offset-2 col-sm-10 help-block"></p>
                        </div>

                        <div class="form-group">
                            <label for="efficiency" class="col-sm-3 control-label">Delivery Efficiency:</label>
                            <div class="col-sm-3">
                                <input id="efficiency" type="text" class="form-control" name="efficiency" placeholder="">
                            </div>
                            <div class="col-sm-3">
                                <select name="" id="input" class="form-control" required="required">
                                    <option value="">Time Unit</option>
                                    <option value="">Minutes (10 ~ 60 minutes)</option>
                                    <option value="">Hours (1 ~ 24 hours)</option>
                                    <option value="">Days (1 ~ 7 calandra days)</option>
                                    <option value="">Weeks (1 ~ 4 calandra weeks)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="efficiency" class="col-sm-offset-2 col-sm-1 control-label">Price:</label>
                            <div class="col-sm-2">
                                <input id="efficiency" type="text" class="form-control" name="efficiency" placeholder="">
                            </div>
                            <div class="col-sm-3">
                                <select name="" id="input" class="form-control" required="required">
                                    <option value="">Currency</option>
                                    @foreach ($countries as $country)
                                        <option value="">{{ $country->name }} ({{ $country->currency_symbol }}) </option>
                                    @endforeach
                                </select>
                            </div>
                          <p class="col-sm-offset-2 col-sm-10 help-block">for standard packages (20cm x 20cm x 20cm, 0.5 kg)
</p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
