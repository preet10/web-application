<?php
   include "messenger_connection.php";
   $sql = "SELECT `name`,`message`,`time` FROM chat ORDER BY `time` DESC";
   $res = $conn->query($sql); 
   while($row = $res->fetch_assoc()):
?>
   <br>
   <span id='name' style="color:red;"><?php echo $row['name'].":"?></span>
   <span id='message'><?php echo $row['message']?></span><br>
   
   <span  id='time'' style="color: green;"><?php echo $row['time']?></span>
   <hr>
<?php endwhile; ?>

   


   