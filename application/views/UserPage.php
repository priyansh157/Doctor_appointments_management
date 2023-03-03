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
           <a href="<?php echo base_url('logout') ?>"> Log out </a>
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
              //$this->session->unset_userdata('failure');
              }
              ?>
    </div>
   <div class="container">
        <h1><?php if(isset($_SESSION['user_name']))
          {  
                $name= $_SESSION['user_name'];           
                echo "<br>Hello , $name " ;
           }?>
        </h1>
      <hr>
      <a href="<?php echo base_url('appointments'); ?>" class="btn btn-primary">View all appointments</a>
      <a href="<?php echo base_url('MakeAppointment'); ?>" class="btn btn-primary">Make an Appointment</a>
      <a href="<?php  $doctor_id=3;  echo base_url().'chat_page'."/".$doctor_id; ?>" class="btn btn-primary">Chat with doctor</a>
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