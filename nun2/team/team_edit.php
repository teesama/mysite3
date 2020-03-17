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
    $team_id = $_GET['team_id'];
    $sqlSTR = "SELECT * FROM team WHERE team_id = '$team_id'";
    $sq = mysqli_query($con,$sqlSTR);
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<table class="table" style="text-align:center;">
    <thead>
        <tr>
            <th colspan = "3">จัดการทีม</th>
        </tr>
    </thead>
    <tbody>
        
        <tr>
            <th>ชื่อทีม </th>
            <th></th>
            <th>ชื่อผู้คุม</th>
            <th></th>
        </tr>
    </tbody>
</table>
</form>

</div>
</body>
</html>