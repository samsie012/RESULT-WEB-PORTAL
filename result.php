<?php
    session_start();
    if($_SESSION['auth']!='true')
    {
        header('location:login5.php');
    }
    
?>
<?php
    include( 'dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RESULT</title>
        <link rel="stylesheet" type="text/css" href="resss.css">
        <link rel="stylesheet" href="bootstrap.css">
        <style type="text/css">
            .container{
                display: flex;
                flex-wrap: wrap;
                background-color: Azure;
                width: 100%;
            
                justify-content: center;
                
            }      
            td{
                padding: 4px;
                text-align: center;
                font-size: 15px;
            }
            .commentk{
                display: flex;
                justify-content: center;
                width: 100%;
                padding: 1%;
                
            }

            .container1{
                
                display: flex;
                width: 100%;
                justify-content: right;
                border: 2px solid black;
                
                }
        

        </style>
    </head>







    <body>
        <?php

            $_POST['rollno']=$_SESSION["resprocess"];
            $ROLL=$_POST['rollno'];
            $sql1N = "SELECT * FROM `csvss2` WHERE ROLL2='$ROLL'";
            $result1N = $conn->query($sql1N);
            $row1N= $result1N->fetch_assoc();

        ?>

        <h3 id="sname"><b>BRISK INTERNATIONAL ACADEMY</b>  <?php echo "[".$row1N["SESSION"]." SESSION"."]"; ?></h3>

     <!--LOGO & ADDRESS-->
                
        <div class="container1" class= "col-lg-10 col-sm-12 col-xs-12">
            <div id="logo">
                <img id="logo1" src="Images/brisk_logo.JPG" alt="school logo">
            </div>
                        
            <div id="address"> <!--addr & std name-->

                <p><b>Behind Northbridge Filling Station opp,mountain of fire ministries,
                suleja mandalla road. </b><br>Email: briskinternationalacademy2011@gmail.com
                <br>Website: www.briskinternationalacademy.com  TEL: 09095640780, 07036024207
                <br>Motto: Morals, Integrity For Academic Excellence</p>


                <div class= "container3">

                    <div>
                    <?php echo "<b>". "NAME: ". $row1N["NAME"]."</b>"; ?>
                    </div>

                    <div>
                    <?php echo "<b>"."CLASS: ".$row1N["CLASS"]. "</b>"; ?>
                    </div>
                
                </div>
           </div>
        
            <div> </div>
                            
            <div> <img id="photo" src="Images/photo1.JPG" alt="school logo"></div>   
      </div>
        
            <div class= "hinfo">
                <div><p><?php echo "<b>"."SEX: ".$row1N["SEX"]. "</b>"; ?></p></div>
                <div><p><?php echo "<b>"."NO IN CLASS: ".$row1N["NO_CLASS"]. "</b>"; ?></p></div>
                <div><p><?php echo "<b>"."POSITION IN CLASS: ".$row1N["POSITION_IN_CLASS"]. "</b>"; ?></p></div>
                <div><p>TIMES SCHOOL OPENED: 150</p></div>  <div><p><?php echo "<b>"."TIME PRESENT: ".$row1N["TOTAL_ATTENDANCE"]. "</b>"; ?></p></div>   
                <div><p><?php echo "<b>"."ROLL NO: ".$row1N["ROLL2"]. "</b>"; ?></p></div>
            </div>

            <!--CA RECORDS-->
        <div class="container">
            <div id="ca" class="col-lg-8 col-md-10 col-sm-10 col-xs-10">
                        
                <table id="carecord">
                        <thead>
                            <tr>
                                    <th>SUBJECTS</th> 
                                    <th>CA(30)</th> 
                                    <th> EXAMS(70)</th>
                                    <th>TOTAL(100) </th>
                                    <th>POSITON </th>
                                    <th>HIGHEST</th>
                                    <th>LOWEST</th>
                                    <th>GRADE</th>
                                    <th>REMARK</th>
                            </tr>
                        </thead>


                        <tbody>

                            <?php 
                            $serialNO= 1;
                            $countmark= 0 ;

                            $sql1 = "SELECT * FROM `csvss2` WHERE ROLL2='$ROLL'";
                            $result1 = $conn->query($sql1);


                            $sql2 = "SELECT * FROM `csvss2`WHERE ROLL_NO LIKE '". $ROLL."' '%'";
                            $result = $conn->query($sql2);


                            //for result
                            if ($result->num_rows > 0) {
                                
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr><td>".$row["SUBJECTS"]."</td><td>".$row["CA"]."</td><td>".$row["EXAMS"]."</td><td>".$row["TOTAL"]."</td><td>".$row["tion"]."</td><td>".$row["HIGHEST"]."</td><td>".$row["LOWEST"]."</td><td>".$row["GRADE"]."</td><td>".$row["REMARK"]."</td></tr>";
                                $countmark+=$row["TOTAL"];
                                $serialNO+=1;
                                }
                                echo 
                    "</tbody>";
                            } else {
                                echo "Empty results";
                                echo "The set session is " . $_POST['rollno']. ".<br>";
                            }




                            $conn->close();
                            ?> 
                                    <!--<tr>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                    </tr>-->
                                
                                        
                </table>


                            <!--TRANFER COMMENT SECTION HERE-->

                            <br><br>
                            
            </div>

                        
            <divb id="psyco" class="col-lg-4 col-sm-2 col-xs-2" >
                    <table><thead>
                                <tr>
                                    <th>PSYCHO-
                                        MOTOR</th> 
                                </tr></thead>

                                <tbody>
                                
                            <?php


                                                    //for result1
                            if ($result1->num_rows > 0) {
                                
                                // output data of each row
                                $row1= $result1->fetch_assoc();
                                    echo "<tr><td>".'HANDWRITING'."</td><td>".$row1["HANDWRITING"]."</td></tr>";
                                    echo "<tr><td>".'FLUENCY'."</td><td>".$row1["VERBAL_FL"]."</td></tr>";
                                    echo "<tr><td>".'HANDWRITING'."</td><td>".$row1["HANDWRITING"]."</td></tr>";
                                    echo "<tr><td>".'HANDWRITING'."</td><td>".$row1["HANDWRITING"]."</td></tr>";
                                    echo "<tr><td>".'HANDWRITING'."</td><td>".$row1["HANDWRITING"]."</td></tr>";
                                    echo "<tr><td>".'SELF/CONTROL'."</td><td>".$row1["ALERTNESS"]."</td></tr>";
                                
                                
                                echo "</tbody>";
                            } else {
                                echo "Empty PSYCHO";
                                echo "The set session is " . $_POST['rollno']. ".<br>";
                            }


                            /*<tr>
                                                        <td id="tdp"></td>
                                                        <td id="tdp"></td>
                                                    </tr>
                                                    <tr>
                                                    <td id="tdp"></td>
                                                        <td id="tdp"></td>
                                                    </tr>
                                                    <tr>
                                                        <td id="tdp"></td>
                                                        <td id="tdp"></td>
                                                    </tr>
                                                    <tr>
                                                    <td id="tdp"></td>
                                                        <td id="tdp"></td>
                                                    </tr>
                                                    <tr>
                                                        <td id="tdp"></td>
                                                        <td id="tdp"></td>
                                                    </tr>
                                                    <tr>
                                                    <td id="tdp"></td>
                                                        <td id="tdp"></td>
                                                    </tr>
                                                    </tbody>
                                                </table> */

                                            
                            ?>
                </table>

                                <!-- Another table-->
                            <table><thead>
                                <tr>
                                    <th>AFFECTIVES</th> 
                                </tr></thead>
                                <tbody>

                                <?php



                                

        //for result1
        if ($result1->num_rows > 0) {
            $row2 = $row1;
        // output data of each row again

        echo "<tr><td>".'HANDWRITING'."</td><td>".$row2["HANDWRITING"]."</td></tr>";
        echo "<tr><td>".'FLUENCY'."</td><td>".$row2["VERBAL_FL"]."</td></tr>";
        echo "<tr><td>".'HANDWRITING'."</td><td>".$row2["HANDWRITING"]."</td></tr>";
        echo "<tr><td>".'HANDWRITING'."</td><td>".$row2["HANDWRITING"]."</td></tr>";
        echo "<tr><td>".'HANDWRITING'."</td><td>".$row2["HANDWRITING"]."</td></tr>";
        echo "<tr><td>".'SELF/CONTROL'."</td><td>".$row2["ALERTNESS"]."</td></tr>";
        echo "<tr><td>".'HANDWRITING'."</td><td>".$row2["HANDWRITING"]."</td></tr>";
        echo "<tr><td>".'FLUENCY'."</td><td>".$row2["VERBAL_FL"]."</td></tr>";
        echo "<tr><td>".'HANDWRITING'."</td><td>".$row2["HANDWRITING"]."</td></tr>";
        echo "<tr><td>".'HANDWRITING'."</td><td>".$row2["HANDWRITING"]."</td></tr>";
        echo "<tr><td>".'HANDWRITING'."</td><td>".$row2["HANDWRITING"]."</td></tr>";
        echo "<tr><td>".'SELF/CONTROL'."</td><td>".$row2["ALERTNESS"]."</td></tr>";



        echo "</tbody>";
        } else {
        echo "Empty Affectives";

        }


                        /*     <tr>
                                    <td id="tdp"></td>
                                    <td id="tdp"></td>
                                </tr>
                                <tr>
                                <td id="tdp"></td>
                                    <td id="tdp"></td>
                                </tr>
                                <tr>
                                    <td id="tdp"></td>
                                    <td id="tdp"></td>
                                </tr>
                                <tr>
                                <td id="tdp"></td>
                                    <td id="tdp"></td>
                                </tr>
                                <tr>
                                    <td id="tdp"></td>
                                    <td id="tdp"></td>
                                </tr>
                                <tr>
                                <td id="tdp"></td>
                                    <td id="tdp"></td>
                                </tr>
                                <tr>
                                    <td id="tdp"></td>
                                    <td id="tdp"></td>
                                </tr>
                                <tr>
                                <td id="tdp"></td>
                                    <td id="tdp"></td>
                                </tr>
                                <tr>
                                    <td id="tdp"></td>
                                    <td id="tdp"></td>
                                </tr>
                                <tr>
                                <td id="tdp"></td>
                                    <td id="tdp"></td>
                                </tr>
                                <tr>
                                    <td id="tdp"></td>
                                    <td id="tdp"></td>
                                </tr>
                                <tr>
                                <td id="tdp"></td>
                                    <td id="tdp"></td>
                                </tr>
                                </tbody>    */
        ?>
                            </table>

                            

                            <table> 
                                        <thead>
                                        <tr>
                                            
                                            <th>RESUMPTION_DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php



                                ?>
                                        <tr>
                                
                                            <td>28/11/2020</td>
                                        </tr>
                                    </tbody>
                            </table>

                    
                        
                </div>
        </div>


                <div class="container3">
                        
                        <div> </div>      
                        <div> </div>
                        <div> </div>
                        <div> </div>
                        <div> </div>
                        <div> </div>
                        <div> </div>
                        <div> </div>
                        <div> </div>
                        <div> </div>
                        <div>
                            <p><b>Total Score: <?php echo $countmark;?></b></p>  
                                
                        </div>
                        <div>
                            <p><b>Average Score:<?php echo $countmark/($serialNO-1);?></b></p>  
                                
                        </div>
                        <div>
                            <p><b>Class Average: 120</b></p>  
                                
                        </div>
                        
                        
                        
                        <div> </div>
                        <div> </div>
                        <div> </div>
                        <div> </div>
                        <div> </div>
                        <div> </div>
                        <div> </div>
                        <div> </div>
                        <div>
                                <table id="sign"> 
                                            <thead>
                                                <tr>
                                                    <th>STAMP/SIGNATURE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><img class="sign" src="Images/brisk_logo.JPG"></td>
                                                
                                                </tr>
                                            </tbody>
                                    </table>
                        </div>
                                
                </div>






                <div class="commentk">
                        <div class="comments">
                            <table id="pc"> 
                            <body>
                            <th>TEACHERS'S COMMENT</th>
                                <?php
                echo "<tr><td>".$row1["TEACHER_COMMENTS"]."</td></tr>";
            
            
                echo "</tbody>";

                                ?>
                            
                                    <!-- <th>TEACHERS'S COMMENT</th>
                                        <tr>
                                            <td>He is a very intellegent and humble programmer</td>
                                        </tr> -->
                            </table>
                        
                            
                            
                            <table id="pc"> 
                                        <th>PRINCIPAL'S COMMENT</th>
                                        <tr>
                                            <td>comment2 hfghgh hvhgvhg bcvghcg bcg</td>
                                        </tr>
                            </table>
                        
                            


                        </div>

                        <div class="keys">
                            <table >
                                <thead><tr>
                                <th>PSYCHOMOTOR'S_KEYS</th>
                                <th>GRADING_KEYS</th>
                                </thead></tr>
                                
                                <tbody>
                                    <tr>
                                    <td> </td>
                                        <td>> 89 = A</td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>70-89 = B</td>
                                    </tr>
                                    <tr>
                                        <td>ssss</td>
                                        <td>ssss</td>
                                    </tr>

                                    <tr>
                                        <td>E = No Regard For Observable Trait</td>
                                        <td>ssss</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                        
                            
                </div>  
        
    </body>
</html>
<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>