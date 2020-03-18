<?php
    @$stu_id = $_GET['stu_id'];
    $sqlchk_stu = "SELECT * FROM student WHERE student_id = '$stu_id'";
    $sqlstuqr = mysqli_query($con,$sqlchk_stu);
    $numstu = mysqli_num_rows($sqlstuqr);
    if($numstu == 1){ //มี รหัส นักศึกษาอยู่ในฐานข้อมูล
      $sqlSTRply = "SELECT * FROM player WHERE team_id = '$team_id'";
      $sqlSTRplyqr = mysqli_query($con,$sqlSTRply);
      $numply = mysqli_num_rows($sqlSTRplyqr);
      $numply +=1;
      $sqlply = "INSERT INTO player (player_id,student_id,sport_id,team_id,season_id)VALUES
      ('$numply','$stu_id','NULL','$team_id','NULL')";
      $sqlplyqr = mysqli_query($con,$sqlply);
      $chknumber = "SELECT * FROM player WHERE team_id = '$team_id'";
      $chknumberqr = mysqli_query($con,$chknumber);
      //$chknumberrow = mysqli_num_rows($chknumberqr);
        while($row = mysqli_fetch_array($chknumberqr)){
            $arr[] = $row['player_id']."-";
        }
        foreach ($arr as &$value) {
            echo $value;
            @$allnum = $allnum.$value;
        }
        echo "allnum = ".$allnum;
      $sqlupdate = "UPDATE team SET amount='$numply',number='$allnum' WHERE team_id = '$team_id'";
      $sqlupdateqr = mysqli_query($con,$sqlupdate);
     
    }else{
      echo "ไม่พบข้อมูล";
    }
  ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
  <div>
    <table class="table">
      <thead>
        <tr>
          <th>เพิ่มผู้เล่น <input type="hidden" name="team_id" id="team_id" value="<?php echo $team_id; ?>" > </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td> รหัสนักศึกษา : <input type="text" name="stu_id" id="stu_id"> <input type="submit" name="add" value="Add"> </td>
          
        </tr>
      </tbody>
    </table>
  </div>
  </form>

<?php 
    $sqlSTRplyshow = "SELECT * FROM player p, student s WHERE p.team_id = '$team_id' and p.student_id = s.student_id";
    $sqlSTRplyshowqr = mysqli_query($con,$sqlSTRplyshow);
    $i=1;
?>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th colspan="3" style="text-align:center;">สมาชิกทีม</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="text-align:center;"> ลำดับ </td>
          <td style="text-align:center;"> ชื่อ - นามสกุล </td>
          <td style="text-align:center;"> จัดการ </td>
        </tr>
        <?php
        while($row = mysqli_fetch_array($sqlSTRplyshowqr)){
        ?>
        <tr>
          <td style="text-align:center;"><?php echo $row['player_id']; ?></td>
          <td style="text-align:center;"><?php echo $row['student_title']." ".$row['student_name']." ".$row['student_surname']; ?></td>
          <td style="text-align:center;"> <a href="player_del.php?player_id=<?php echo $row['player_id']."&team_id=".$team_id; ?>" class="btn btn-danger">ลบ</a> </td>
        </tr>
        <?php
        $i++;
        }
        ?>
      </tbody>
    </table>
  </div>
