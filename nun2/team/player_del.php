<?php
    include '../connect.php';
    $team_id = $_GET['team_id'];
    $player_id = $_GET['player_id'];
    echo "team_id = ".$team_id;
    $sqlSTR = "DELETE FROM player WHERE player_id ='$player_id'";
    $sqlSTRqr = mysqli_query($con,$sqlSTR);

    $sqlSTRply = "SELECT * FROM player WHERE team_id = '$team_id'";
      $sqlSTRplyqr = mysqli_query($con,$sqlSTRply);
      $numply = mysqli_num_rows($sqlSTRplyqr);
      //$numply -=1;
    $sqlupdate = "UPDATE team SET amount='$numply',number='$allnum' WHERE team_id = '$team_id'";
    $sqlupdateqr = mysqli_query($con,$sqlupdate);
?>
<script>
    
    window.location.href = 'team_edit.php?team_id=<?php echo $team_id; ?>';
    
</script>