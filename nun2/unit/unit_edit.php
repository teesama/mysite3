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
    <title>แก้ไขข้อมูลหน่วยกีฬา</title>
</head>
<body>

<meta charset="utf-8">

<?php
require_once '../connect.php';
$sql="SELECT * FROM sport_unit WHERE Unit_id = '".$_GET["Unit_id"]."' ";
  $result=$con->query($sql);
	$show=mysqli_fetch_array($result);

		if(isset($_POST['save'])){
			$Unit_id = $_POST['Unit_id'];
      $Unit_name = $_POST['Unit_name'];
		          $sql = "UPDATE sport_unit SET Unit_id = '$Unit_id',Unit_name = '$Unit_name' WHERE Unit_id = '".$_GET["Unit_id"]."'";
		          $query = $con->query($sql);
		            if($query == TRUE  ){
		              echo "<script language=\"JavaScript\">";
		              echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว')";
		              echo "</script>";
		              echo '<meta http-equiv=refresh content=0;URL=unit.php>';
		            }else{
		              echo "<script language=\"JavaScript\">";
		              echo "alert('การแก้ไขผิดพลาดกรุณาตรวจสอบข้อมูลอีกครั้ง')";
		              echo "</script>";
		              echo '<meta http-equiv=refresh content=0;URL=unit.php>';
		            }
		        };



 ?>



<div class="container" style="width:700px;margin-top:40px;">
            <div class="card" style="background-Color: #ccc;">
                <div class="card-header   text-center"><h5 style="color: #000;">แก้ไขข้อมูลของ<?php echo $show['Unit_name'];?></h5></div>
                		<div class="card-body" style="background-color: #fff">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">รหัสหน่วยกีฬา : </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control"  name="Unit_id" value="<?php echo $show['Unit_id'];?>" >
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">ชื่อหน่วยกีฬา : </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control"  name="Unit_name" value="<?php echo $show['Unit_name'];?>" >
                                </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <div class="col-lg-6" style="text-align: right">
                                <input type="submit" class="btn btn-success col-4" name="save" value="ตกลง">
                            </div>
                            <div class="col-lg-6" style="text-align: left">
                                <a  class="btn btn-danger col-4"  href="unit.php" style="color:white; text-decoration-line: none;">ยกเลิก</a>
                            </div>
                        </div>

                    </form>
                  </div>
            </div>
          </div>
</div>
<br><br>
