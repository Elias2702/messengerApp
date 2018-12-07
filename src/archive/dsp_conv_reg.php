<?php 
require_once 'db_param.php';
          
try {
  $db_conv_reg = new PDO ($dsn, $user_db, $pass_db);
  $db_conv_reg -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $q_conv_reg="SELECT id, num_particip, creation_time, particip_id FROM messenger.conv_reg;";
  $result = $db_conv_reg -> query("$q_conv_reg")->fetchAll();
  //print_r($result);
  
  echo'<legend><p>list of conversations</p>';
  echo "";
               foreach ($result as $row) {
                                      
                  echo '<option>'.'<br>'. 'id: '. $row['id']. ' - number of participants: '. $row['num_particip']. '   '. ' - creation time: '. $row['creation_time'] . ' - id of participants: '. $row['particip_id'] .'<br>'.'</option>';
                   } 
                   echo "</select>"."</legend>"."</span> ";   
                         
          } catch (Exception $ex) {
              echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
          }                       
                     