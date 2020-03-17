<!DOCTYPE html>
<html lang="en">
<head>
  <!-- head เป็นไฟล์ควบคุม css bootstrap ทั้งหมดของหน้า index -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/mycss.css">
  
</head>
<body>
<?php include '../connect.php'; ?>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../index.php">ระบบจัดการการแข่งขันกีฬาภายในวิทยาลัยเทคนิคสัตหีบ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline ">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">ชื่อผู้ใช้ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">|</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#logout">Logout</a>
      </li>
    </ul>
    </form>
  </div>
</nav>

<?php
    if(isset($_POST['btn_team'])){
        $teamname = $_POST['team_name'];
        $team_personal_name = $_POST['team_personal_name'];
        $sqlnum = "SELECT * FROM team";
        $sqlnumqc = mysqli_query($con,$sqlnum);
        $num = mysqli_num_rows($sqlnumqc);
        $num +=1;
        echo "num = ".$num;
        $sqlteam = "INSERT INTO team (team_id,team_name,amount,number,personnel_id) VALUES
                    ('$num','$teamname',NULL,NULL,'$team_personal_name')";
        $sqlteamqc = mysqli_query($con,$sqlteam);
        if($sqlteamqc){
            echo "เพิ่มทีมเรียบร้อย";
        }else{
            echo "เพิ่มไม่ได้<br>";
            echo "SQL = ".$sqlteam;
        }
    }else{
        echo "no";
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<table class="table" style="text-align:center;">
    <thead>
        <tr>
            <th colspan = "3">สร้างทีม</th>
        </tr>
    </thead>
    <tbody>
        
        <tr>
            <th> ชื่อทีม <input type="text" name="team_name" id="team_name" placeholder="TeamName"></th>
            <th> บุคลากร <input type="text" name="team_personal_name" id="team_personal_name" placeholder="personalName"></th>
            <td colspan=3> <input type="submit" value="เลือก" name="btn_team" class="btn btn-warning"> </td>
        </tr>
    </tbody>
</table>
</form>
<?php
    $sqlteamshow = "SELECT * FROM team";
    $sqlteamshowqc= mysqli_query($con,$sqlteamshow);
?>
<table class="table">
    <thead>
        <tr>
            <th>Teamid</th>
            <th>team_name</th>
            <th>amount</th>
            <th>number</th>
            <th>Personnel_id</th>
            <th>manage</th>
        </tr>
    </thead>
    <tbody>
    <?php
    while($row = mysqli_fetch_array($sqlteamshowqc)){
    
    ?>
        <tr>
            <td><?php echo $row['team_id'] ?></td>
            <td><?php echo $row['team_name'] ?></td>
            <td><?php echo $row['amount'] ?></td>
            <td><?php echo $row['number'] ?></td>
            <td><?php echo $row['personnel_id'] ?></td>
            <td>
                <a href="team_edit.php?team_id=<?php echo $row['team_id']; ?>" class="btn btn-info">Edit</a>
                <a href="team_del.php?team_id=<?php echo $row['team_id']; ?>" class="btn btn-danger">Del</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>




</div>
</body>
</html>