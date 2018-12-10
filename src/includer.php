<?php
session_start();
$cur_mem_id = $_SESSION['id'];
$cur_mem_psd = $_SESSION['pseudo'];


?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_antoine.css">
    <title>Inclpickertest</title>
</head>

<body>

   

    <div class="container-fluid global-cont row no-padding no-margin">
        
        <header class="container-fluid no-padding no-margin header">balblabliuhkseuyv
        </header>
    
        <div class="col-xs-1 col-sm-2 col-md-3 no-padding no-margin pck-pnl">
    
                <form  method='POST'>
                    <br>
                        <?php
                            include 'picker.php';
                        ?>
                    <br>
                </form>

        </div>              
        <div class="col-xs-10 col-sm-8 col-md-6 no-padding no-margin ctr-pnl">
            <div class="col-auto central scrolldown">
                <form method='POST'>   
                    <br>
                        <?php
                            include 'central.php';
                        ?>
                    <br>                    
                </form>
            </div>
        
            <div class="send no-padding no-margin">
                
                    <?php
                        include 'create_msg.php';
                    ?>
                
            </div>
            <div>
            <span> <form action="dsp_add_picker.php" style="display:inline;" >
                <input type="submit" value="Add member" ></span>
                </form>
                <form action="leave_conv.php" method="post" style="display:inline;">
                    <input type="submit" value="Leave Conversation">
                </form></span>
            </div>
        </div>  
        <div class='col-xs-1 col-sm-2 col-md-3 no-padding no-margin'>
            blabla
        </div>
    </div>

<!-- defines the JS function that is used in central.php to display emojis.php and msg_edit.php 
on a new small window --> 
<script type="text/javascript">
function showPopup(url) {
newwindow=window.open(url,'name','height=190,width=520,top=200,left=300,resizable');
if (window.focus) {newwindow.focus()}
}
</script>
    
</body>
</html>