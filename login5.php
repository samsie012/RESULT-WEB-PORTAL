

<!DOCTYPE html>


<html>
    <head>
        <title>MY LOGIN TEST5</title>
        <script type="text/javascript" src="jquery-3.5.1.js"></script>
        <link rel="stylesheet" href="bootstrap.css">
        <script type="text/javascript" src="bootstrap.js"></script>
        <style>
          .bd{
              background-color: yellow;
          }

          #fm{
                  
              border-radius: 5px;
              background-color: #f2f2f2;
              padding: 30px;
            }

          .msg{
            color: red;
          }
        </style>
    </head>
      

      

  <body class="bd">
    <br><br><br>
    <div class="container">
     <div class="row">
       <div class="col-sm-6 mx-auto">
              
          <div id="fm">


            <form method="POST" >
              <div class="form-group">
                <h2 >RESULT CHECKER</h2>
                <label for="exampleInputEmail1">Admission No</label>
                <input name="rollno" type="text" class="form-control" required placeholder="Please, enter your ROLLNO." > 
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Result Pin</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" required placeholder="Enter your password">
              </div>

              <h5 class= "msg">Recomended web browsers: Chrome and Firefox</h5>
              <button type="submit" class="btn-primary"  name="login">Check Result</button>
            </form>
          </div>
        </div>  
      </div>
    </div>
  </body>
</html>





<?php
// Deal with undefined variable issues
  
  $rollans="";
  $rowB="";
  $compare=5;
  $rusan="";
  $rowADM="";
// end of undefined variables

if(isset($_POST['login'])){

	// Database configuration
	$dbHost     = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName     = "schoolr";

	 // Create database connection
	$db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);


  //database query with variables
  $ROLL= $_POST['rollno'];
  $PIN= ($_POST['password']);
        



  	  

  //database query1
  $query1="SELECT PIN FROM pintable where PIN =?";
  $result9= $db -> prepare($query1);
  $result9 -> bind_Param('s', $PIN);
  $result9-> execute();
  $res=$result9->get_result();
  $result1=$res->fetch_assoc();
  if($result1!=""){
  $rusan= $result1["PIN"];}


   
  //database query2
  $query2="SELECT ROLL2 FROM csvss2 where ROLL2 =?";
        

  $result10= $db -> prepare($query2);
  $result10 -> bind_Param('s', $ROLL);
  $result10-> execute();
  $res2=$result10->get_result();
  $rowAD = $res2->fetch_assoc();
  if($rowAD!=""){
    $rowADM= $rowAD["ROLL2"];
  }



  //database query3
  $query="SELECT ROLL_ID FROM pintable where PIN ='$rusan'";
  $result=mysqli_query($db, $query);
    
  if(mysqli_num_rows($result)==1){
    $row = $result->fetch_assoc();
    $rowA= join(" ",$row);
    $compare= strcasecmp($ROLL, $rowA);
  }



         

          
       
    
  /* If the input admission no exist in the pintable 
  |& is the same($compare) with admission no registered in the pintable &
  | the input PIN is found in the pintable
   Start session if query is true*/
	    
  if($rowADM!=$rollans  && $compare==0 && $rusan!=$rollans  ){
    session_unset();
    session_start();

    // Set session variables
    $_SESSION["resprocess"] = $ROLL;


    $_SESSION['auth'] = 'true';
    header('location:result.php');
	}


  // If the input PIN is not found in the pintable
  //& the input admision no is not the same($compare) with admission no registered in the pintable
  //& the admission ($rowA) no is not found in the *pintable* for the input PIN
 elseif($rusan!=$rollans && ($compare!=0) && $rowA!=$rollans ){
    session_unset();
    $PIN="";
    $ROLL="";
    include('error2.php');

    // If the PIN($rusan) exist in the pintable & 
     //admission no($rowADM) exist in *result table* &
     // the admission ($rowA) no is not found in the *pintable*, Register PIN as used with the admission NO in the pintable.
  }elseif($rusan!=$rollans  && $rowADM!=$rollans && $rowA==$rollans ){
       
     
    $query4=" UPDATE pintable SET ROLL_ID= '$rowADM' WHERE PIN='$rusan'";
    $row4=mysqli_query($db, $query4);

    session_unset();
    session_start();

    // Set session variables
    $_SESSION["resprocess"] = $ROLL;


    $_SESSION['auth'] = 'true';
      
    header('location:result.php');
	}else{
    session_unset();
    $PIN="";
    $ROLL="";
    include('error1.php');
	}

}



?>
<!--Clear the cache history memory ti prevent form input resubmission-->
<script>
if (window.history.replaceState){
  window.history.replaceState( null, null, window.location.href );
}
</script>