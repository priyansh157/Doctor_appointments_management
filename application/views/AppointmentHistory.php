<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>All appointments</title>
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
            <?php }
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
      <h3>All appointments</h3>
      <hr>
         <div class="row">           
            <div class="col-md-9">
                <table class="table table-striped" style="text-align:center;">
                        <tr>
                        <th>Appointment no</th>
                        <th>Appointment reason</th>
                        <th>Appointment date</th>
                        <th>Appointment time</th>
                        <th>Status</th>
                        
                        </tr>
                     <?php $i=1;
                        foreach($appointments as $appointment)
                           {  ?><tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $appointment['appo_title']; ?></td>
                            <td><?php echo $appointment['appo_date'];?></td>
                            <td><?php echo $appointment['appo_time'];?></td>
                            <td><?php if($appointment['status']==1)
                                          echo "Pending";
                                      else if($appointment['status']==2)
                                          echo "Rejected"; 
                                      else
                                          echo "Completed";
                                 ?>
                            </td>
                            
                           </tr>
                           <?php $i++; 
                        }           
                     ?>  
                </table>
               </div> 
               <div class="col-md-3">
                  <a href="<?php echo base_url('MakeAppointment'); ?>" class="btn btn-primary">Add an Appointment</a>
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