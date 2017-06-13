<?php include("_header.php"); 

mysql_connect("classmysql.engr.oregonstate.edu","cs340_simsw","9855");
mysql_select_db("cs340_simsw");

$name = $_GET["name"];

echo $name;

//query
$sql=mysql_query("SELECT exerciseID, name FROM Exercise");
$sql2=mysql_query("SELECT name FROM Routine WHERE name = '$name'");
if(mysql_num_rows($sql)){
$select= '<select name=exerciseID>';
$select2= '<select name="routineID">';
echo '<form action="insertExercise.php" method="post">';
echo '<br><br>';
echo 'defaultSets: <input type="text" name="defaultSets" />';
echo '<br><br>';
echo 'defaultReps: <input type="text" name="defaultReps" />';
echo '<br><br>';
while($rs=mysql_fetch_array($sql)){
      $select.='<option value="'.$rs['exerciseID'].'">'.$rs['name'].'</option>';
  }
  
while($rs2=mysql_fetch_array($sql2)){
      $select2.='<option value="'.$rs2['routineID'].'">'.$rs2['name'].'</option>';
  }
}
$select.='</select>';
$select.='</select>';
echo $select;
echo '<br><br>';
echo $select2;
echo '<br><br>';
echo '<input type="submit" />';
echo '<br><br>';
echo '</form>';
?>
