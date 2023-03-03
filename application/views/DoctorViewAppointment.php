<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor page </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
    <script href="<?php echo base_url().'bootstrap.bundle.min.js'?>" ></script>
    <script href="<?php echo base_url().'bootstrap.bundle.min.js.map'?>" ></script>
</head>
<body>
      <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Hospital Site</a>
            <div style="background:aliceblue;">
            <a href="<?php echo base_url('logout') ?>">Log out</a>
        </div>
        </div>
      </div> 
      <div class="container">
        <div class="row">
        <div id="success"></div>
        
            <?php 
             $success = $this->session->tempdata('success');
             if($success !=""){
            ?>
             <div class="alert alert-success" id="success"><?php echo $success;?></div>
            <?php 
              }
              ?>
             <?php 
              $failure = $this->session->tempdata('failure');
              if($failure !=""){
               ?>
             <div class="alert alert-danger failure"><?php echo $failure ?></div>
             <?php 
              }
              ?>
        </div>
      </div>

<div class="container" style="padding-top: 10px;">
<div class="col-md-12">
<div class="col-md-6"><h3>All Patients appointment history</h3></div>  

</div>       
<hr>

<div class="row">
<div class="col-md-8">
  <table class="table table-striped " style="text-align: center;border:2px;">
        <tr>
          <th>S.No.</th>         
          <th>Name</th>
          <th>Appointment no</th>
          <th>Email</th>
          <th>Appointment date</th>
          <th>Appointment time</th>
          <th>Appointment reason</th>
          <th>Status</th>
          <th>Chat with User</th>
        </tr>
        <?php  if(!empty($appointments)){
          $i=1;
          foreach($appointments as $appointment) { ?>
                  <tr>
                      <td><?php  echo $appointment['offset']+$i ;?></td>
                      <td><?php  echo $appointment['username']?></td>
                      <td><?php  echo $appointment['appo_no']?></td>
                      <td><?php  echo $appointment['email']?></td>
                      <td><?php  echo $appointment['appo_date']?></td>
                      <td><?php  echo $appointment['appo_time']?></td>
                      <td><?php  echo $appointment['appo_title']?></td> 
                      <td><select style="background-color: aqua;" name="" id="status" required onchange="changeStatus(this.value,'<?php  echo $appointment['user_id']?>','<?php  echo $appointment['appo_no']?>')" >
                        <option value="" selected disabled>---Select---</option>
                        <option value="1" <?php if($appointment['status']==1){echo "selected";}?>>Pending</option>
                        <option value="2" <?php if($appointment['status']==2){echo "selected";}?>>Reject</option>
                        <option value="3" <?php if($appointment['status']==3){echo "selected";}?>>Completed</option>          
                      </select></td>
                      
                      <td><a href="<?php echo base_url().'chat_page'."/".$appointment['user_id']; ?>">Chat</a></td>
                  </tr>      
        <?php $i++; }}else { ?>
          <tr> 
          <td>Records not found</td>
          </tr>
        <?php } 
        echo $this->pagination->create_links();  
       ?>  
      </table>
  </div>
</div>

</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
  function changeStatus(st_flag,user_id,appo_no){

      var base_url='<?php echo base_url(); ?>';

          $.ajax({
          url : base_url + "DoctorController/Change_st",
          type : "POST",
          data : {
            st_flag : st_flag,
            user_id  : user_id,
            appo_no : appo_no
            },
          success : function(data) {
            console.log("success");
              if(data=="success"){
                  $("#success").html(
                    `<div class="alert alert-success">Status updated successfully!</div>`
                  )
                  }else{
                    $("#success").html(
                    `<div class="alert alert-failure">Something went wrong!</div>`
                   ) 
                  }
                  setInterval(function(){
                    $('.alert').fadeOut();
                  },2000)  
            },

          error : function(data) {
            console.log("failure");
            $("#success").html(
                    `<div class="alert alert-failure">Something went wrong!</div>`
                    )
                    setInterval(function(){
                    $('.alert').fadeOut();
                  },2000)   
              }
    });
  }
  setInterval(function() {
    $('.alert').fadeOut();
  }, 2000);
</script>
</html>