@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Manage My Routines</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
        
                        <div class="form-group">
                                <label for="city_delivery" class="col-sm-3 control-label">City of Delivery:</label>
                                <div class="col-sm-3">
                                    <select name="city_delivery" id="city_delivery" class="form-control" required="required">
                                        <option value="">Choose your city</option>
                                        <option value="">Vancouver</option>
                                    </select>
                                </div>
                                     <div class="btn" style="position: relative;">
                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">City Area</button>
                                <ul class="dropdown-menu" style="min-width: 100px;">
                                  <li><a href="#" class="small" data-value="option1" tabIndex="-1">East<input type="checkbox"/ class="pull-right"></a></li>
                                  <li><a href="#" class="small" data-value="option2" tabIndex="-1">South<input type="checkbox"/ class="pull-right"></a></li>
                                  <li><a href="#" class="small" data-value="option3" tabIndex="-1">West<input type="checkbox"/ class="pull-right"></a></li>
                                  <li><a href="#" class="small" data-value="option4" tabIndex="-1">North<input type="checkbox"/ class="pull-right"></a></li>
                                  <li><a href="#" class="small" data-value="option5" tabIndex="-1">Center<input type="checkbox"/ class="pull-right"></a></li>
                                </ul>
                                  </div>
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
                            <label for="efficiency" class="col-sm-1 control-label">Price:</label>
                            <div class="col-sm-2">
                                <input id="efficiency" type="text" class="form-control" name="efficiency" placeholder="">
                            </div>
                            <div class="col-sm-3">
                                <select name="" id="input" class="form-control" required="required">
                                   
                                </select>
                            </div>
                            <label class="control-label col-sm-6 text-left">
                                for standard packages (20cm x 20cm x 20cm, 0.5 kg)
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
