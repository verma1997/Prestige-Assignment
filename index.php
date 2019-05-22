<?php
  $content = '<div class="row">
                <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Employees Details</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="employees" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Department</th>
                        <th>Date of Birth</th>
                        <th>Date of Joining</th>
                        <th>Salary</th>
                        
                      </tr>
                      </thead>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>';

  include('master.php');
?>
<!-- page script -->
<script>

  $(document).ready(function(){

    $.ajax({
        type: "GET",
        url: "http://localhost:80/pRESTige-master/api/employees",
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var user in data){
                response += "<tr>"+
                "<td>"+data[user].id+"</td>"+
                "<td>"+data[user].first_name+"</td>"+
                "<td>"+data[user].last_name+"</td>"+
                "<td>"+data[user].department+"</td>"+
                "<td>"+data[user].DOB+"</td>"+
                "<td>"+data[user].DOJ+"</td>"+
                "<td>"+data[user].salary+"</td>"+
                "<td> <a onClick=Remove('"+data[user].id+"')> Delete </a></td>"+
                "<td><a href='update.php?id="+data[user].id+"'> Update </a></td>"+
                "</tr>";
            }
            $(response).appendTo($("#employees"));
        }
    });
  });

  function Remove(id){

    $.ajax(
        {
            type: "POST",
            url: 'http://localhost:80/pRESTige-master/api/employees',
            dataType: 'json',
            data: {
                id: id
            },
            error: function (data) {
                alert(data.responseText);
            },
            success: function (data) {
                if (data['status'] == true) {
                    alert("Successfully Removed Employee!");
                    window.location.href = 'Prestige-Assignment/index.php';
                }
                else {
                    alert(data['message']);
                }
            }
        });
  };

</script>