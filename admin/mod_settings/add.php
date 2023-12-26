
<form class="form-horizontal well span6" action="controller.php?action=add" method="POST">

	<fieldset>
		<legend>New Setting</legend> 
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "DESCRIPTION">Description:</label>

              <div class="col-md-8"> 
                <textarea class="form-control input-sm" id="DESCRIPTION" name="DESCRIPTION" placeholder=
                    "Description" type="text" rows="6">  </textarea> 
              </div>
            </div>
          </div>  
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "type">Type:</label>

              <div class="col-md-8">
                <select class="form-control input-sm" name="type" id="type">
                  <option value="About Us">About Us</option>
                  <option value="Contact Us">Contact Us</option>
                    <option value="Mission">Mission</option>
                  <option value="Vision">Vision</option>
                </select> 
              </div>
            </div>
          </div>

		
		 <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "idno"></label>

              <div class="col-md-8">
                <button class="btn btn-primary" name="save" type="submit" >Save</button>
              </div>
            </div>
          </div>

			
	</fieldset>	
	
</form>


</div><!--End of container-->
			
