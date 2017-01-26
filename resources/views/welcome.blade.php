@extends('layouts.app')
@section('content')
<?php 
$countries = DB::select('select * from countries');
?>
<div class="container">
<div id="successMessageRegister alert alert-success"></div>

<div class="row">
<?php  ?>
        <div class="col-md-12">
        <div id="successMessage"></div>

            <div class="panel panel-default">
                <div class="panel-heading text-center">LOWER COST BUT HIGHER EFFICIENCY AND WE'RE JUST AN INFANT NOW</div>
                <div class="panel-body">
                    <form id="form_contact" class="form-horizontal" role="form" method="POST" action="" data-toggle="validator">
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="width:18%;">
                            <input id="urgent-checkbox" type="checkbox" value="">
                            URGENT DELIVERY
                          </label>
                        </div>
                        <div class="form-group">
                            <div id="urgent" style="display: none">
                            <label for="arrival_time" class="col-md-2 control-label">Expected Arrival Time</label>
                            <div class="col-md-2">
                                <input id="arrival_time" type="text" class="form-control" name="arrival_time" value="" autofocus>
                            </div>
                            <label class="col-md-2 control-label" style="width:18%;">OR Expected Arrrival in:</label>
                            <div class="col-md-2">
                                <input id="arrival_time-2" type="text" class="form-control" name="arrival_time" value="" autofocus>
                            </div>
                            <label class="col-md-1 control-label text-left">hours</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-2 control-label">Pick-up Time:</label>
                            <div class="col-md-2">
                                <input id="pickup_time" type="text" class="form-control" name="pickup_time" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group pickup">
                            <label for="pickup_location" class="col-md-2 control-label">Pick-up Location:</label>

                            <div class="col-md-3">
                                        <select name="country" class="countries form-control" required="required">
                                        <option value="">Select country</option>
                                        @foreach($countries as $country) 
                                        <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
                                        @endforeach
                                        </select>
                            </div>
                            <div class="col-md-3">
                                 <select name="state" class="states form-control" required="required">
                                 <option value="">Select country first</option>
                                        </select>
                            </div>
                            <div class="col-md-3">
                                 <select name="city" class="form-control cities" required="required">
                                            <option value="">Select state/province first</option>
                                        </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3 col-lg-offset-2">
                                <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Street/Road/Ave Name" required>
                            </div>
                          <div class="col-lg-3">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Suite Number">
                          </div>
                          <div class="col-lg-3">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Postal Code" required>
                          </div>

                        </div>
                        <div class="col-lg-offset-2">
                          <p class="form-control"  style="border:none;">If your location is not in the list, please tell us your unique address</p>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-3 col-lg-offset-2">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Country">
                          </div>
                          <div class="col-lg-3">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Province">
                          </div>
                          <div class="col-lg-3">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="City">
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="col-lg-3 col-lg-offset-2">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Street/Road/Ave Name">
                          </div>
                          <div class="col-lg-3">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Suite Number">
                          </div>
                          <div class="col-lg-3">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Postal Code">
                          </div>
                        </div>  
                        <div class="form-group destination">
                            <label for="package_destination" class="col-md-2 control-label">Package Destination:</label>

                            <div class="col-md-3">
                                 <select name="" class="countries form-control" required="required">
                                 <option value="">Select country</option>
                                 @foreach($countries as $country) 
                                        <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
                                        @endforeach
                                        </select>
                            </div>
                        <div class="col-md-3">
                                 <select name="" class="form-control states" required="required">
                                 <option value="">Select country first</option>
                                        </select>
                            </div>
                        <div class="col-md-3">
                                 <select name="" class="form-control cities" required="required">
                                            <option value="">Select state/province first</option>
                                        </select>
                            </div>
                            </div>
                        <div class="form-group">
                        <div class="col-lg-3 col-lg-offset-2">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Street/Road/Ave Name" required>
                          </div>
                          <div class="col-lg-3">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Suite Number">
                          </div>
                          <div class="col-lg-3">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Postal Code" required>
                          </div>
                        </div>
                        <div class="col-lg-offset-2">
                          <p class="form-control" style="border:none;">If your location is not in the list, please tell us your unique address</p>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-3 col-lg-offset-2">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Country">
                          </div>
                          <div class="col-lg-3">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Province">
                          </div>
                          <div class="col-lg-3">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="City">
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="col-lg-3 col-lg-offset-2">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Street/Road/Ave Name">
                          </div>
                          <div class="col-lg-3">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Suite Number">
                          </div>
                          <div class="col-lg-3">
                            <input id="pickup_location" type="text" class="form-control" name="pickup_location" placeholder="Postal Code">
                          </div>
                        </div> 
                        <div class="form-group">
                            <label for="pickup_location" class="col-md-2 control-label">Package Demensions:</label>
                        </div>
                        <div class="form-group mb0">
                            <label for="pickup_location" class="col-md-2 control-label">Length:</label>
                            <div class="col-md-2">
                                <input id="pickup_location" type="text" class="form-control" name="pickup_location" required placeholder="cm">
                            </div>
                            <label for="pickup_location" class="col-md-1 control-label">Width:</label>
                            <div class="col-md-2">
                                <input id="pickup_location" type="text" class="form-control" name="pickup_location" required placeholder="cm">
                            </div>
                            <label for="pickup_location" class="col-md-1 control-label">Height:</label>
                            <div class="col-md-2">
                                <input id="pickup_location" type="text" class="form-control" name="pickup_location" required placeholder="cm">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-9">
                                <span class="help-block">
                                    (Please enter "20" if your package is smaller than 20cm x 20cm x 20cm)
                                </span>
                            </div>
                        </div>
                        <div class="form-group mb0">
                            <label for="pickup_location" class="col-md-2 control-label">Package Weight:</label>

                            <div class="col-md-2">
                                <input id="pickup_location" type="text" class="form-control" name="pickup_location" required placeholder="kg">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-9">
                                <span class="help-block">
                                    (Please enter "0.5" if your package is less than 0.5 kg)
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pickup_location" class="col-md-2 control-label">Sender's Name:</label>

                            <div class="col-md-3">
                                <input id="pickup_location" type="text" class="form-control" name="pickup_location" required placeholder="Last Name">
                            </div>
                             <div class="col-md-3">
                                <input id="pickup_location" type="text" class="form-control" name="pickup_location" required placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pickup_location" class="col-md-2 control-label">Receiver's Name:</label>

                            <div class="col-md-3">
                                <input id="pickup_location" type="text" class="form-control" name="pickup_location" required placeholder="Last Name">
                            </div>
                             <div class="col-md-3">
                                <input id="pickup_location" type="text" class="form-control" name="pickup_location" required placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="center-block text-center">
                                <button id="submit" type="submit" class="btn btn-primary">
                                    Estimated my delivery
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="routine" class="row hide">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h4>AVAILABLE DELIVERY ROUTINES</h4></div>
                <div class="panel-body">
                    <div id="routine">
<form action="" method="POST" role="form">
    <table id="routine_table" class="table table-striped table-bordered tablesorter">
        <thead>
            <tr>
                <th>Select Routine #</th>
                <th>Delivery Comapny</th>
                <th>Estimated Transit Duration</th>
                <th>Estimated Arrival Time</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="radio">
                        <label>
                            <input type="radio" name="route" value="" checked="checked">
                            Routine #1
                        </label>
                    </div>
                </td>
                <td>Company #1</td>
                <td>2 days</td>
                <td>01/05/2017</td>
                <td>150$</td>
            </tr>
            <tr>
                <td><div class="radio">
                        <label>
                            <input type="radio" name="route" value="">
                            Routine #2
                        </label>
                    </div></td>
                <td>Company #2</td>
                <td>5 days</td>
                <td>01/08/2017</td>
                <td>210$</td>
            </tr>
        </tbody>
    </table>
    <button type="submit" class="btn btn-default">Place order</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
