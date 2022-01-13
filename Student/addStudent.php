  <div class="modal-dialog modal-xl">
    <div class="modal-content p-4">

      <!-- Modal Header -->
      <h4 class="modal-title text-center ">Fill Student Details</h4><hr class="w-25 mx-auto ">
      <!-- Modal body -->
      <div class="modal-body">
      <form action="Student/Stud_code.php"  method="POST" >
          <div class="row">
            <div class="col-md-6">
             <div class="form-group">
                  <i class="fa fa-user "></i>&nbsp;<label >Student Name</label>
                  <input type="text" class="form-control" placeholder="Student Name" name="sName" autocomplete="off"
                  pattern="[A-Za-z]{1,255}" title="Enter the Vaild Name!" required>
             </div>
             <div class="form-group">
                  <i class="fa fa-mobile-phone "></i>&nbsp;<label for="mobile"  >Mobile</label>
                  <input type="text" class="form-control" placeholder="mobile" name="sMobile" autocomplete="off" 
                  pattern="[7-9]{1}[0-9]{9}" title="Enter the Vaild Mobile Number!" required>
             </div>
             <div class="form-group">
                <i class="fa fa-envelope "></i>&nbsp;<label for="email" >Email</label>
                <input type="email" class="form-control" placeholder="Email" name="sEmail" autocomplete="off" required>
             </div>
            </div>
          <div class="col-md-6">
             <div class="form-group">
                  <i class="fa fa-user "></i>&nbsp;<label for="name"  >Father Name</label>
                  <input type="text" class="form-control" placeholder="Father Name" name="fName" autocomplete="off"
                  pattern="[A-Za-z]{1,255}" title="Enter the Vaild Name!" required >
             </div>
             <div class="form-group">
                  <i class="fa fa-mobile-phone "></i>&nbsp;<label for="mobile" >Parent Mobile</label>
                  <input type="text" class="form-control" placeholder=" Mobile Number" name="fMobile" autocomplete="off"
                  pattern="[7-9]{1}[0-9]{9}" title="Enter the Vaild Mobile Number!" required>
             </div>
             <div class="form-group">
                  <i class="fa fa-table "></i>&nbsp;<label  >Standard</label>
                  <select name="std" required id="std" class="form-control" >
                    <option value="">Select Standard...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12" >12</option>
                  </select>
             </div>
             <p id="branch"></p>
          </div>
          </div>
          <div class="form-group">
                <i class="fa fa-home "></i><label for="address"  >&nbsp;Address</label>
                <textarea type="text" class="form-control" rows="2" placeholder="address" name="address" autocomplete="off"  required></textarea>
          </div>
            <p>Please select your medium:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" id="Hindi" name="medium" value="Hindi">
              <label for="" class="font-weight-bold">Hindi</label>&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" id="English" name="medium" value="English">
              <label for="" class="font-weight-bold">English</label>
            </p>
          <div class="text-center ">
            <button type="submit" class="btn btn-outline-primary" name="rSignup" >Save</button>
            <button type="button" class="btn btn-outline-primary " data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
      $(document).ready(function(){                
        $("#std").change(function(){
            if(this.value >10){
              $('#branch').empty();
                $('#branch').append(`<input type="radio" id="Hindi" name="stream" value="Science">
                                    <label for="" class="font-weight-bold">Science</label>&nbsp;
                                    <input type="radio" id="English" name="stream" value="Commerce">
                                    <label for="" class="font-weight-bold">Commerce</label>`);
                  }else if(this.value<11){
                    $('#branch').empty();
                  }
          });
    })
</script>