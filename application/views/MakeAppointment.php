<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Make an appointment</title>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>">
</head>

<body>
   <div class="navbar navbar-dark bg-dark">
      <div class="container">
         <a href="#" class="navbar-brand">Bangur Hospital</a>
         <div style="background:aliceblue;">
           <a href="<?php echo base_url('logout') ?>">Log out</a>
        </div>
      </div>
   </div>
   <div class="row">
            <?php 
             $success = $this->session->tempdata('success');
             if($success !=""){
            ?>
             <div class="alert alert-success"><?php echo $success;?></div>
            <?php 
              }
              ?>
             <?php 
              $failure = $this->session->tempdata('failure');
              if($failure !=""){
               ?>
             <div class="alert alert-danger"><?php echo $failure; ?></div>
             <?php 
              }
              ?>
    </div>
   <div class="container">
      <h3>Make an appointment</h3>
      <hr>
      <form method="post" name="createUser" action="<?php echo base_url('appointment_form'); ?>">
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label>Appointment title</label>
                  <input type="test" name="title"  class="form-control">
               </div>
               <div class="form-group">
                  <label>Date</label>
                  <input type="date" name="date"  class="form-control">
                  <?php echo form_error('date'); ?>
               </div>
               <div class="form-group">
                  <label>Time</label>
                  <input type="time" name="time"  class="form-control">
                  <?php echo form_error('time'); ?>
               </div>
               <div class="form-group">
                  <button class="btn btn-primary" type="submit">Save</button>
                  <a href="<?php echo base_url('appointments');?>" class="btn-secondary btn">Cancel</a>
               </div>
             </div>   
         </div>   
      </form>
   </div>
 </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script> 
  setInterval(function() {
    $('.alert').fadeOut();
  }, 2000);
</script>
</html>