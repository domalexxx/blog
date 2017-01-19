<div class="modal fade" id="modal_login">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">LOGIN</h4>
			</div>
			<div class="modal-body">
				<form id="logForm" method="POST" action="{{ url('/login') }}" novalidate>
				    {!! csrf_field() !!}
				    <div class="form-group text-right">
				    	<button type="button" class="btn btn-success modalRegister">SIGN UP</button>
				    </div>	
				    <div class="form-group email-group">
			            <div class="input-group">
			    		    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					        <input type="text" id="email" class="form-control" name="email" placeholder="Email">
				        </div>
				        <p class="help-block"></p>
				
				    </div>
				    <div class="form-group password-group">
		    	        <div class="input-group">
		    			    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					        <input type="password" id="password" class="form-control" name="password" placeholder="Password">
						</div>
				        <p class="help-block"></p>
				    </div>
				    <div class="form-group" id="login-errors">
                            <span class="help-block">
                                <strong id="form-login-errors"></strong>
                            </span>
                        </div>
				    <div class="checkbox">
				        <label><input type="checkbox"> Remember me</label>
			      	</div>
			      	<div class="form-group">
			      		<button type="submit" class="btn btn-primary">LOGIN</button>
			      	</div>
				    <div class="form-group text-center">
				    	<a href="">Forgot your password ?</a>
				    </div>
				</form>
			</div>
		</div>
	</div>
</div>