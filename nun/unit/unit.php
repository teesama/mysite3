
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
    <title>adsad</title>
</head>
<body>

<div class="container">
 <?php include '../connect.php';?>

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

 <!-- ฟอร์มจัดการข้อมูลหน่วยกีฬา -->
<br>
    <div class="container" style="border:1px white solid; width:1110px; height: 100%;  background-color:#fff; ">
<br>
    <div style="font-size:30px; text-align:center;">จัดการข้อมูลหน่วยกีฬา</div>
    <br>
    <div class="form-group row" style="margin-left:200px;">
      <label for="inputPassword" class="col-sm-3 col-form-label"><b>ค้นหาข้อมูลหน่วยกีฬา</b></label>
      <form action="unit_find.php" enctype="multipart/form-data" method="post">
      <div class="col-sm-6"  >
        <input type="text" class="form-control" id="find" name="find" placeholder="กรอกรหัสหน่วยกีฬา">
      </div>
      <div style="margin-left:300px; margin-top:-36px;">
          <button type="submit" class="btn btn-info">ค้นหา</button>
      </div>
      <div style="margin-left:320px; margin-top:-38px;">
      <a href="unit_add.php"><button type="button" class="btn btn-success" style="margin-left:80px;" >+เพิ่มหน่วยกีฬา</button></a>
      </div>
    </form>
    </div>


    <br><br>
    <center><table class="table table-hover" style=" width:100%">
      <tr style="text-align:center;background-color:#00BCD4;">
          <td><B>รหัสหน่วยกีฬา</td></B>
          <td><B>ชื่อหน่วยกีฬา</td></B>
          <td><B>สี</td></B>

        <td><B>การจัดการ</td></B>

      </tr>
      <?php
      $sql = "SELECT * FROM sport_unit ORDER BY Unit_number";
      $query = $con->query($sql);
        $i=1;
        while($row = $query->fetch_assoc()){

      ?>
      <tr >
            <td  style="text-align:center;" ><?php echo $row['Unit_number'] ?></td>
            <td ><?php echo $row['Unit_name'] ?></td>
        <td style="text-align:center;"><?php echo $row['Color'] ?></td>

            <td align="center">
              <a href="Unit_edit.php?Unit_number=<?php echo $row['Unit_number']?>" class="btn btn-primary">[แก้ไข]</a>
              <a href="Unit_delete.php?Unit_number=<?=$row['Unit_number']?>" onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')" class="btn btn-danger">[ลบ]</a>
            </td>

      </tr>
      <?php
      $i++;
      }
      ?>

    </table>
    </div>
</div>
</body>
</html>
