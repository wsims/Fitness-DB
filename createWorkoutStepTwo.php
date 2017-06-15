<?php include("_header.php"); 
 
 mysql_connect("classmysql.engr.oregonstate.edu","cs340_simsw","9855");
 mysql_select_db("cs340_simsw");

 $routineName = $_GET["name"];
 
 //query
 $sql=mysql_query("SELECT exerciseID, name FROM Exercise");
 $sql2=mysql_query("SELECT routineID, name FROM Routine WHERE name = '$routineName'");
 $sql3=mysql_query("SELECT name FROM Routine WHERE name = '$routineName'");
 if(mysql_num_rows($sql)){
 $select= '<select name=exerciseID>';
 $select2= '<select name="routineID" style="display:none">';
 $select3= '<select name="name" style="display:none">';
 echo '<form action="insertExercise.php" method="post">';
 echo '<br><br>';
 echo 'Default Sets: <input type="text" name="defaultSets" />';
 echo '<br><br>';
 echo 'Default Reps: <input type="text" name="defaultReps" />';
 echo '<br><br>';
 echo 'Choose Your Exercise ';
 while($rs=mysql_fetch_array($sql)){
       $select.='<option value="'.$rs['exerciseID'].'">'.$rs['name'].'</option>';
   }
   
 while($rs2=mysql_fetch_array($sql2)){
       $select2.='<option value="'.$rs2['routineID'].'">'.$rs2['name'].'</option>';
   }

    while($rs3=mysql_fetch_array($sql3)){
       $select3.='<option value="'.$rs3['name'].'">'.$rs3['name'].'</option>';
   }
 }


 $select3.='</select>';
 $select2.='</select>';
 $select.='</select>';

 echo $select;
 echo '<br><br>';
 echo $select2;
 echo $select3;
 echo '<input type="submit" value="Add"/>         ';
 echo '<input type="button" onclick="window.location=\'http://web.engr.oregonstate.edu/~bolanosf/FitnessDB/login.php\'" class="register" value="Done"/>';



 ?>