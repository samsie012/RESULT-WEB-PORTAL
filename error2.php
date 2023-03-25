<?php 
echo "<html>"?>
    <head>
        <script type="text/javascript" src="jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="bootstrap.css">

    
        <script type="text/javascript" src="bootstrap.js"></script>
        <style>
            #wrong{
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 40%;
            }
          </style>
    </head>
 
  
  <!-- Modal1 -->
  <div id= "mymodal" class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Sorry, the PIN you entered has been used by another user.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img id="wrong" src="Images/download.PNG" alt="">
         <p> <b>ACTION REQUIRED : Please, obtain and eneter a new PIN. 
           You may also check if you've entered a wrong admission number.</b></p>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
        
        </div>
      </div>
    </div>
  </div>

 <!-- Modal2 -->
 <div id= "mymodal2" class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">The PIN you entered has been used by another user.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img id="wrong" src="wrong.PNG" alt="">
         <p> <b>Please, eneter a new PIN.</p> 
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
    
      $("#mymodal").modal();
  
    
    });
  
    </Script>
  <?php echo "</html>" ?>