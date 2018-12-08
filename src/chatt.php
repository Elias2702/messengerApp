<?php

session_start();

require_once './func php/f_db_con.php';
$db_cnct = dbase_con();
require_once './func php/f_get_convers_msg.php';
require_once './func php/f_get_mem_id.php';
require_once './func php/f_get_convers_reg.php';
require_once './func php/f_crt_new_msg.php';
require_once './class php/user_class.php';

$cur_mem_id = $_SESSION['mem']->$id;

?>
<html>
    <head>
        <link rel = "stylesheet" href = "css/bootstrap.css"></link>
        <link rel = "stylesheet" href ="chatt.css"></link>
        
    </head>
    <body>
        <div class = "container">
            <div class = "row">
                <div class ="col-lg-4 col-md-6 col-sm-12">
                    <div class = "os">
                            left
                            <?php  $mem = unserialize($_SESSION['mem']);
                           //print_r($mem);
                            //var_dump($_SESSION['mem']); ?>
                        <form action="get_cnv_id.php"  target="message_display_iframe">
                            <select name="dsp-cnv" id="dsp-cnv" onclick="js_get_cnv_id()" size = "10" style="width:250px;">
                                    <?php
                                       
                                       $cnv_list2 = $mem->get_my_cnv($cur_mem_id);
                                        
                                        foreach ($cnv_list2 as $row) { //display function
                                            echo "<option value =" . $row["id"] . ">". $row["particip_id"] ."<br> "."</option>";   
                                        }
                                    ?>        
                                </select>
                                <input type="text" name="pacman" value='' >
                                <input type="submit" id="get_cnv_id">
                        </form>
                    </div>
                </div>
                <div class ="col-lg-4 col-md-6 col-sm-12">
                    <div class = "os">
                                hola
                        <iframe name="message_display_iframe" style="height:250px;">
                            
                        
                            <select id="dsp_cnv" size = "10" style="width:250px;">
                                <?php
                                   /* $msg_list2 = get_convers_msg($cnv_ident);
                                        foreach ($msg_list2 as $row) {
                                            echo "<option>". $row["content"] ."<br> "."</option>";   
                                        }*/
                                ?>        
                            </select>
                            
                        </iframe>
                        <div><input type='text' name='crt_msg' id='crt_msg'></div>
                    </div>
                 </div>
                <div class ="col-lg-4 col-md-6 col-sm-12">
                    <div class = "os">
                                right
                                <p id='dsp-tst'></p>
                    </div>
                </div>
            </div>
        </div>
        <script src='./chatt.js'></script>
    </body>
</html>
<!--form action="">
        <select name="" id="">

        </select>
        <input type="text">
        <input type="submit">
    </form-->