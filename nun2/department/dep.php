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
    <title>การจัดการข้อมูลแผนก</title>
</head>
<body>

<div class="container">
 <?php include '../connect.php';?>

  <!-- navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand" href="../index.php">ระบบจัดการการแข่งขันกีฬาภายในวิทยาลัยเทคนิคสัตหีบ</a>


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
    <div style="font-size:30px; text-align:center;">จัดการข้อมูลแผนก</div>
    <br>
    <div class="form-group row" style="margin-left:150px;">

      <label class="col-sm-3 col-form-label"><b>ค้นหาข้อมูลแผนก</b></label>

      <form method="get">
      <div class="col-sm-9" class="search"  >
        <input type="text" class="form-control" name="search" placeholder="กรอกชื่อแผนก" value="<?php echo @$_GET['search']; ?>">
      </div>
      <div  class="search" style="margin-left:300px; margin-top:-39px;">
          <button type="submit" class="btn btn-warning" style="margin-right:2px;">ค้นหา</button>
      </div>
    </form>
    </div>
<br>
  <div class="">
      <ul class="nav nav-tabs card-header-tabs" style="margin-top:-78px; margin-left:800px;">
        <li class="">
          <a href="dep_add.php" ><button type="button" class="btn btn-success">+เพิ่มข้อมูลแผนก</button></a>
        </li>
      </ul>
  </div>
<br><br>


    <center><table class="table table-hover" style=" width:100%">
      <tr style="text-align:center;background-color:#00BCD4;">
          <td><B>รหัสแผนก</td></B>
          <td><B>ชื่อแผนก</td></B>
          <td><B>สีประจำแผนก</td></B>
          <td><B>เบอร์โทรศัพท์</td></B>
          <td><B>การจัดการ</td></B>

      </tr>

      <!-- เรียกข้อมูลให้ data base มาแสดงและทำการค้นหาได้ -->
      <?php
      $search=isset($_GET['search']) ? $_GET['search']:'';
      $sql = "SELECT * FROM department WHERE dep_name LIKE '%$search'";
      $query = $con->query($sql);
      if ($query->num_rows>0) {
        while($row = $query->fetch_assoc()){
      ?>
      <tr >
            <td align="center"><?php echo $row['dep_id'] ?></td>
            <td align="center"><?php echo $row['dep_name'] ?></td>
            <td align="center"><?php echo $row['dep_color'] ?></td>
            <td align="center"><?php echo $row['dep_tel'] ?></td>
            <td align="center">
              <a href="dep_edit.php?dep_id=<?php echo $row['dep_id']?>" class="btn btn-primary">[แก้ไข]</a>
              <a href="dep_delete.php?dep_id=<?=$row['dep_id']?>" onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')" class="btn btn-danger">[ลบ]</a>
            </td>
      </tr>
      <?php
              }
            }
            $con->close();
             ?>

    </table>
    </div>
</div>
</body>
</html>
