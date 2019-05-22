<?php 
  $content = '<div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add Employee</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="first_name">First Name</label>
                          <input type="text" class="form-control" id="first_name" placeholder="Enter the First Name : ">
                        </div>
                        <div class="form-group">
                          <label for="last_name">Last Name</label>
                          <input type="text" class="form-control" id="last_name" placeholder="Enter the Last Name">
                        </div>
                        <div class="form-group">
                          <label for="department">Department</label>
                          <input type="text" class="form-control" id="department" placeholder="Enter the Department">
                        </div>
                        <div class="form-group">
                          <label for="DOB">Date Of Birth</label>
                          <input type="text" class="form-control" id="DOB" placeholder="Enter your Date of Birth">
                        </div>
                        <div class="form-group">
                          <label for="DOJ">Date Of Joining</label>
                          <input type="text" class="form-control" id="DOJ" placeholder="Enter your Date of Joining">
                        </div>
                        <div class="form-group">
                          <label for="salary">Salary</label>
                          <input type="text" class="form-control" id="salary" placeholder="Enter the Salary">
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="AddEmployee()" value="Submit"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>';
  include('master.php');
?>
<script>
  function AddEmployee(){
        $.ajax(
        {
            type: "POST",
            url: 'http://localhost:80/pRESTige-master/api/employees',
            dataType: 'json',
            data: {
                id: $("#id").val(),
                first_name: $("#first_name").val(),
                last_name: $("#last_name").val(),
                department: $("#department").val(),
                DOB: $("#DOB").val(),
                DOJ: $("#DOJ").val(),
                salary: $("#salary").val()
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Added New Employee!");
                    window.location.href = 'Prestige-Assignment/index.php';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>