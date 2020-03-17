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
    <title>การจัดการข้อมูลนักศึกษา</title>
</head>
<body>
<?php include '../connect.php'; ?>
<div class="container">
  <!-- navbar -->
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
 <br>

 <!-- ฟอร์มแสดงข้อมูล -->
 <div class="container" style="border:1px white solid; width:1110px; height: 100%;  background-color:#fff; ">
<br>
   <div style="font-size:30px; text-align:center;">จัดการข้อมูลนักศึกษา</div>
<br>
<div class="form-group row" style="margin-left:230px;">
<label class="col-sm-3 col-form-label"><b>ค้นหาข้อมูลหน่วยกีฬา</b></label>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<table class="table" style="text-align:center;">
    <div class="col-sm-9" class="search"  >
      <input type="text" class="form-control" name="search" placeholder="กรอกชื่อนักศึกษา">
    </div>
    <div  class="search" style="margin-left:300px; margin-top:-39px;">
        <button type="submit" class="btn btn-warning" style="margin-right:2px;">ค้นหา</button>
    </div>
</table>
</form>
</div>

    <table class="show_student table">

        <tr style="text-align:center;background-color:#00BCD4;">
            <th>ลำดับ</th>
            <th>รหัสนักศึกษา</th>
            <th>ชื่อ - นามสกุล</th>
            <th>แผนก</th>
            <th>ระดับชั้น</th>
        </tr>
        <?php   if(isset($_POST['submit'])){?>
        <?php   $search = $_POST['search'];
                $strSQL = "SELECT * FROM student s, level l , branch b WHERE s.level_id = l.level_id and s.branchl_id = b.branch_id AND s.student_id LIKE '%$search%'";
                $sql = mysqli_query($con,$strSQL);

                    ?>
        <?php   }else{?>
        <?php   $strSQL = "SELECT * FROM student s, major m , level l WHERE s.level_id = l.level_id and s.branchl_id = b.branch_id";
                $sql = mysqli_query($con,$strSQL);

                    ?>
        <?php   }   ?>

        <?php
            while($row = $sql->fetch_assoc()){
        ?>
        <tr align="center">
            <td><?php echo $i; ?></td>
            <td><?php echo $row['student_id'];?></td>
            <td><?php echo $row['student_title']." ".$row['student_name']." ".$row['student_surename']; ?></td>
            <td><?php echo $row['branch_name']; ?></td>
            <td><?php echo $row['level_name']; ?></td>
        </tr>
      <?php } ?>

      <?php
            $con->close();
             ?>

</table>





</div>
</body>
</html>
