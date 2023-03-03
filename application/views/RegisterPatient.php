<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register user</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
</head>
<body>
      <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Bangur Hospital</a>
        </div>
      </div> 
      <div class="row">
            <?php 
             $success = $this->session->userdata('success');
             if($success !=""){
            ?>
             <div class="alert alert-success"><?php echo $success;?></div>
            <?php 
              $this->session->unset_userdata('success');
              }
              ?>
             <?php 
              $failure = $this->session->userdata('failure');
              if($failure !=""){
               ?>
             <div class="alert alert-danger"><?php $failure ?></div>
             <?php 
              //$this->session->unset_userdata('failure');
              }
              ?>
        </div>
      <div class="container">
         <h3>Registration</h3>
         <hr>
         <form method="post" name="createUser" action="<?php echo base_url('register_form'); ?>">
          <div class="row"> 
            <div class="col-md-6">
                <div class="form-group">
                   <label >Name</label>
                   <input type="text" name="name" value="<?php echo set_value('name');?>" class="form-control">
                   <?php echo form_error('name'); ?>
                </div>
                <div class="form-group">
                   <label >Email</label>
                   <input type="email" name="email" value="<?php echo set_value('email');?>" class="form-control">
                   <?php echo form_error('email'); ?>
                </div>
                <div class="form-group">
                   <label >Password</label>
                   <input type="password" name="password" value="<?php echo set_value('password');?>" class="form-control">
                   <?php echo form_error('password'); ?>
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-primary">Sign Up</button>
                   <a href="<?php echo base_url('login');?>" class="btn-secondary btn">Cancel</a>
                   Already have a account?<a href="<?php echo base_url('login');?>"> Sign in</a>
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