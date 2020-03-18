<?php
    include '../connect.php';
    $team_id = $_GET['team_id'];
    $sqlSTR = "DELETE FROM team WHERE team_id ='$team_id'";
    $sqlSTRqr = mysqli_query($con,$sqlSTR);

?>
<script>
    
    window.location.href = 'team_ins.php';
    //window.history.back()
</script>