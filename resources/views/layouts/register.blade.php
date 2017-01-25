<div class="modal fade" id="modal_register">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">SIGN UP</h4>
			</div>
			<div class="modal-body">
				<form id="regForm" method="POST" action="{{ url('/register') }}" novalidate>
				    {!! csrf_field() !!}
				    <div class="form-group text-right">
				    	<button type="button" class="btn btn-primary modalLogin">LOGIN</button>
				    </div>	
				    <div class="fname-group form-group">
					    <div class="input-group">
						    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					        <input type="text" id="fname" class="form-control" name="fname" placeholder="First Name">
				        </div>
			            <p class="help-block"></p>
				    </div>
				    <div class="lname-group form-group">
				        <div class="input-group">
						    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						    <input type="text" id="lname" class="form-control" name="lname" placeholder="Last Name">
					    </div>
				        <p class="help-block"></p>
				    </div>
				    <div class="email-group form-group">
				        <div class="input-group">
						    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						    <input type="text" id="email" class="form-control" name="email" placeholder="Email">
					    </div>
				        <p class="help-block"></p>

				    </div>
				    <div class="password-group form-group">
				        <div class="input-group">
						    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						    <input type="password" id="password" class="form-control" name="password" placeholder="Create Your  Password">
					    </div>
				        <p class="help-block"></p>
				    </div>
				    <div class="password_confirmation-group form-group">
				        <div class="input-group">
						    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Confirm Your Password">
					    </div>
				        <p class="help-block"></p>
				    </div>
				    <button type="submit" class="btn btn-success">SIGN UP</button>
				</form>
			</div>
		</div>
	</div>
</div>