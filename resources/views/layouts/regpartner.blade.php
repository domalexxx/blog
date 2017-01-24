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
        <form class="form-horizontal" id="partnerRegForm" method="POST" action="{{ url('/partner/register') }}" novalidate enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group text-right">
          <div class="col-md-12">
              <button type="button" class="btn btn-success partnerModalLogin">LOGIN</button>
          </div>
        </div>  
          <div class="company_name-group form-group">
            <label for="company_name" class="col-sm-2 control-label">Company Name:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="company_name" placeholder="Enter your Company Name" name="company_name">
            </div>
            <p class="col-sm-offset-2 col-sm-10 help-block"></p>
          </div>
          <div class="business_number-group form-group">
            <label for="business_number" class="col-sm-2 control-label">Business Number:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="business_number" placeholder="Enter your Business Number" name="business_number">
            </div>
            <p class="col-sm-offset-2 col-sm-10 help-block"></p>
          </div>
          <div class="office_location-group form-group office_location">
            <label for="office_location" class="col-md-2 control-label">Office Location:</label>
            <div class="col-md-3">
                        <select name="office_location[0][country]" id="office_location_country" class="form-control countries" required="required">
                            <option value="">Select country</option>
                           @foreach($countries as $country) 
                             <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
                           @endforeach
                        </select>
            </div>
            <div class="col-md-3">
              <select name="office_location[1][state]" id="office_location_state" class="form-control states" required="required">
                <option value="">Select State/Province</option>
              </select>
            </div>
            <div class="col-md-3">
              <select name="office_location[2][city]" id="office_location_city" class="form-control cities" required="required">
                <option value="">Select City</option>
              </select>
            </div>
            <div class="col-lg-3 col-lg-offset-2">
                  <input id="office_location_street" type="text" class="form-control" name="office_location[3][street]" required placeholder="Street/Road/Ave Name">
              </div>
              <div class="col-lg-3">
              <input id="office_location_suite" type="text" class="form-control" name="office_location[4][suite]" required placeholder="Suite Number">
            </div>

            <div class="col-lg-3">
              <input id="office_location_postal" type="text" class="form-control" name="office_location[5][postalcode]" required placeholder="Postal Code">
            </div>
            <p class="col-sm-offset-2 col-sm-10 help-block"></p>
          </div>
          <div class="form-group branch_location">
            <label for="branch_location" class="col-md-2 control-label">Branch Location:</label>
            <div class="col-md-3">
              <select name="branch_location[]" id="branch_location_country" class="form-control countries" required="required">
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
            <div class="col-lg-3 col-lg-offset-2">
                  <input id="branch_location_street" type="text" class="form-control" name="branch_location[]" required placeholder="Street/Road/Ave Name">
              </div>
              <div class="col-lg-3">
              <input id="branch_location_street" type="text" class="form-control" name="branch_location[]" required placeholder="Suite Number">
            </div>
            <div class="col-lg-3">
              <input id="branch_location_street" type="text" class="form-control" name="branch_location[]" required placeholder="Postal Code">
            </div>
            <p class="col-sm-offset-2 col-sm-10 help-block"></p>
          </div>
          <div class="form-group">
            <label for="branch_manager" class="col-sm-2 control-label">Branch Manager:</label>
            <div class="col-sm-4">
              <input name="branch_manager[0][fname]" type="text" class="form-control" id="branch_manager_fname" placeholder="First Name">
            </div>
            <div class="col-sm-4">
              <input name="branch_manager[1][lname]" type="text" class="form-control" id="branch_manager_lname" placeholder="Last Name">
            </div>
            <p class="col-sm-offset-2 col-sm-10 help-block"></p>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Office Telephone:</label>
            <div class="col-sm-2">
              <select name="office_phone" class="form-control" required="required">

              </select>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="">
            </div>
            <p class="col-sm-offset-2 col-sm-10 help-block"></p>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Branch Manager's Cellphone:</label>
            <div class="col-sm-2">
              <select name="manager_phone" class="form-control" required="required">
              	
              </select>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="">
            </div>
            <p class="col-sm-offset-2 col-sm-10 help-block"></p>
          </div>
          <div class="form-group">
            <label for="office_email" class="col-sm-2 control-label">Office/Branch Email:</label>
            <div class="col-sm-3">
              <input name="office_email" type="email" class="form-control" placeholder="Enter office/branch email">
            </div>
            <div class="col-sm-1 text-center">
				<label class="control-label">OR</label>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="">
            </div>
          <label class="control-label">@bnmbox.com</label>
          <p class="col-sm-offset-2 col-sm-10 help-block"></p>
          </div>
          <div class="form-group business_license_number-group">
            <label for="business_license_number" class="col-sm-2 control-label">Business License Number:</label>
            <div class="col-sm-6">
              <input name="business_license_number" type="text" class="form-control" placeholder="Enter your business licence Number">
            </div>
            <p class="col-sm-offset-2 col-sm-10 help-block"></p>
          </div>
          <div class="form-group">
            <label for="scanned_business" class="col-sm-2 control-label">Scanned Business License for the Current Year:</label>
            <div class="col-sm-6">
              <input name="scanned_business" type="file" class="form-control" placeholder="">
            </div>
            <p class="col-sm-offset-2 col-sm-10 help-block"></p>
          </div>
          <div class="form-group">
            <label for="issued_documents" class="col-sm-2 control-label">Other Government-issued Documents:</label>
            <div class="col-sm-6">
              <input name="issued_documents" type="file" class="form-control" placeholder="">
            </div>
            <p class="col-sm-offset-2 col-sm-10 help-block"></p>
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