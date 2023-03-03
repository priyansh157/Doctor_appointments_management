<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
      <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Bangur Hospital</a>
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
         <h3>Log in</h3>
         <hr>
         <form method="post" name="createUser" action="<?php echo base_url('login_form'); ?>">
          <div class="row"> 
            <div class="col-md-6">
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
                   <button type="submit" class="btn btn-primary">Sign In</button>
                   <a href="<?php echo base_url('login');?>" class="btn-secondary btn">Cancel</a>
                   Don't have a account?<a href="<?php echo base_url('register');?>"> Sign up</a>
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