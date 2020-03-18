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
<?php
$i =1;
?>
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
    $team_id = $_GET['team_id'];
    $sqlSTR = "SELECT * FROM team WHERE team_id = '$team_id'";
    $sqlSTRqr = mysqli_query($con,$sqlSTR);
    echo $sqlSTR;
?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <table class="table" style="text-align:center;">
        <thead>
            <tr>
                <th colspan = "4">จัดการทีม</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row=mysqli_fetch_array($sqlSTRqr)){
            ?>
            <tr>
                <th>ชื่อทีม </th>
                <th> <input type="text" name="team_name" id="team_name" value="<?php echo $row['team_name']; ?>"></th>
                <th>ชื่อผู้คุม</th>
                <th><input type="text" name="personnel_id" id="personnel_id" value="<?php echo $row['personnel_id']; ?>"></th>
            </tr>
            
            <tr>
                <th>จำนวน</th>
                <th> <input type="text" name="amount" id="amount" value="<?php echo $row['amount']; ?>" disabled></th>
                <th>เบอร์</th>
                <th><input type="text" name="number" id="number" value="<?php echo $row['number']; ?>"></th>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="4" style="text-align:right;"> 
                  <input type="submit" class="btn btn-info" name="edit" value="ยืนยัน"> 
                  <input type="submit" class="btn btn-danger" name="back" value="ย้อนกลับ"> </td>
            </tr>
        </tbody>
    </table>
  </form>
  <br>
  <?php include 'player_ins.php'; ?>


  

</div>
</body>
</html>