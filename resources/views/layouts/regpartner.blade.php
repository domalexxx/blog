<?php 
$countries = DB::select('select * from countries');
?>
<div class="modal fade bs-example-modal-lg in" "="" id="partnerReg" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">JOIN US AS A DELIVERY PARTNER</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="partnerLogForm" method="POST" action="{{ url('/partner/login') }}" novalidate>
        {!! csrf_field() !!}
        <div class="form-group text-right">
          <div class="col-md-12">
              <button type="button" class="btn btn-success partnerModalLogin">LOGIN</button>
              </div>
            </div>  
          <div class="form-group">
            <label for="company_name" class="col-sm-2 control-label">Company Name:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="company_name" placeholder="Enter your Company Name" name="company_name">
            </div>
          </div>
          <div class="form-group">
            <label for="business_number" class="col-sm-2 control-label">Business Number:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="business_number" placeholder="Enter your Business Number" name="business_number">
            </div>
          </div>
          <div class="form-group office_location">
            <label for="office_location" class="col-md-2 control-label">Office Location:</label>

            <div class="col-md-3">
                        <select name="office_location[]" id="office_location_country" class="form-control countries" required="required">
                           <option value="">Select country</option>
                            @foreach($countries as $country) 
                              <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
                            @endforeach
                            
                        </select>
            </div>
            <div class="col-md-3">
                 <select name="office_location[]" id="office_location_state" class="form-control states" required="required">
                  <option value="">Select country first</option>
                        </select>
            </div>
            <div class="col-md-3">
                 <select name="office_location[]" id="office_location_city" class="form-control cities" required="required">
                    <option value="">Select state/province first</option>
                  </select>
            </div>
          </div>
          <div class="form-group">
              <div class="col-lg-3 col-lg-offset-2">
                  <input id="office_location_street" type="text" class="form-control" name="office_location[]" required placeholder="Street/Road/Ave Name">
              </div>
            <div class="col-lg-3">
              <input id="office_location_suite" type="text" class="form-control" name="office_location[]" required placeholder="Suite Number">
            </div>
            <div class="col-lg-3">
              <input id="office_location_postal" type="text" class="form-control" name="office_location[]" required placeholder="Postal Code">
            </div>

          </div>
          <div class="form-group branch_location">
            <label for="branch_location" class="col-md-2 control-label">Branch Location:</label>

            <div class="col-md-3">
                        <select name="branch_location[]" id="branch_location_country" class="form-control countries" required="required">
                            <option value="">Select country</option>
                             @foreach($countries as $country) 
                               <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
                             @endforeach
                        </select>
            </div>
            <div class="col-md-3">
                 <select name="branch_location[]" id="branch_location_state" class="form-control states" required="required">
                            <option value="">Select country first</option>
                        </select>
            </div>
            <div class="col-md-3">
                 <select name="branch_location_city" id="input" class="form-control cities" required="required">
                    <option value="">Select state/province first</option>
                </select>
            </div>
          </div>
          <div class="form-group">
              <div class="col-lg-3 col-lg-offset-2">
                  <input id="branch_location_street" type="text" class="form-control" name="branch_location[]" required placeholder="Street/Road/Ave Name">
              </div>
            <div class="col-lg-3">
              <input id="branch_location_street" type="text" class="form-control" name="branch_location[]" required placeholder="Suite Number">
            </div>
            <div class="col-lg-3">
              <input id="branch_location_street" type="text" class="form-control" name="branch_location[]" required placeholder="Postal Code">
            </div>

          </div>
          <div class="form-group">
            <label for="branch_manager" class="col-sm-2 control-label">Branch Manager:</label>
            <div class="col-sm-4">
              <input name="branch_manager[]" type="text" class="form-control" id="branch_manager_fname" placeholder="First Name">
            </div>
            <div class="col-sm-4">
              <input name="branch_manager[]" type="text" class="form-control" id="branch_manager_lname" placeholder="Last Name">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Office Telephone:</label>
            <div class="col-sm-2">
              <select name="" id="input" class="form-control" required="required">
              	
              </select>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="inputPassword3" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Branch Manager's Cellphone:</label>
            <div class="col-sm-2">
              <select name="" id="input" class="form-control" required="required">
              	
              </select>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="inputPassword3" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Office/Branch Email:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Enter office/branch email">
            </div>
            <div class="col-sm-1 text-center">
				<label class="control-label">OR</label>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="inputPassword3" placeholder="">
            </div>
          <label class="control-label">@bnmbox.com</label>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Business License Number:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Enter your business licence Number">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Scanned Business License for the Current Year:</label>
            <div class="col-sm-6">
              <input type="file" class="form-control" id="inputPassword3" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Other Government-issued Documents:</label>
            <div class="col-sm-6">
              <input type="file" class="form-control" id="inputPassword3" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">SIGN UP</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>