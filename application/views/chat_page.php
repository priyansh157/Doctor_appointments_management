<?php 
$receiver_id = $receiver;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                       <?php if($receiver_id==3){?> Doctor <?php }else {?>Patient <?php } ?>
                    </div>
                    <div class="card-body" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0" id="chat-body">
                        <!-- chat messages will be displayed here -->
                         <div id="my_chat">

                         </div>   
                    </div>
                    <div class="card-footer">
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" id="msg" class="form-control" placeholder="Message">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" id="send" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div>
                <div style="background:aliceblue;">
                 <a href="<?php echo base_url('logout') ?>"> Log out </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Link to jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- Link to Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

<script>
$(document).ready(function(){ 
    var base_url = '<?php  echo base_url()?>';
  var receiver = '<?php echo $receiver_id?>';
  if(receiver!=''){
    $.ajax({
        
        type:"POST",
        url:base_url + 'load_chat',
        data: {receiver:receiver},
        success: function(data){
            $('#my_chat').html(data);
            
        }});
   $('#send').click(function(){
        
        var messege = $('#msg').val();
        if(messege != '')
        {
            $.ajax({
                method: "POST",
                url: base_url + 'send_chat',
                data:{messege:messege,
                    receiver:receiver },
                success:function(data)
                {   
                    $("#msg").val("");
                    get_all_chat();
                    
                }
            });  
        }  
    });
}
else
console.log("receiver id not found");
});

function get_all_chat(){
  var base_url = '<?php  echo base_url()?>';
  var receiver = '<?php echo $receiver_id?>';
    $.ajax({
        type:"POST",
        url:base_url + 'load_chat',
        data: {receiver:receiver},
        success: function(data){
            $('#my_chat').html(data);   
            }
        });
}
setInterval(function() {
    get_all_chat();
  }, 2000);

</script>

