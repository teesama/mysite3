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
$sql="SELECT * FROM department WHERE dep_id = '".$_GET["dep_id"]."' ";
  $result=$con->query($sql);
	$show=mysqli_fetch_array($result);

		if(isset($_POST['save'])){
			$dep_id = $_POST['dep_id'];
      $dep_name = $_POST['dep_name'];
      $dep_color = $_POST['dep_color'];
      $dep_tel = $_POST['dep_tel'];
		  $sql = "UPDATE department SET dep_id = '$dep_id',dep_name = '$dep_name',dep_color = '$dep_color',dep_tel = '$dep_tel' WHERE dep_id = '".$_GET["dep_id"]."'";
		  $query = $con->query($sql);
		            if($query == TRUE  ){
		              echo "<script language=\"JavaScript\">";
		              echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว')";
		              echo "</script>";
		              echo '<meta http-equiv=refresh content=0;URL=dep.php>';
		            }else{
		              echo "<script language=\"JavaScript\">";
		              echo "alert('การแก้ไขผิดพลาดกรุณาตรวจสอบข้อมูลอีกครั้ง')";
		              echo "</script>";
		              echo '<meta http-equiv=refresh content=0;URL=dep.php>';
		            }
		        };



 ?>



<div class="container" style="width:700px;margin-top:40px;">
            <div class="card" style="background-Color: #ccc;">
                <div class="card-header   text-center"><h5 style="color: #000;">แก้ไขข้อมูลของ<?php echo $show['dep_name'];?></h5></div>
                		<div class="card-body" style="background-color: #fff">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">รหัสหน่วยกีฬา : </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control"  name="dep_id" value="<?php echo $show['dep_id'];?>" >
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">ชื่อหน่วยกีฬา : </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control"  name="dep_name" value="<?php echo $show['dep_name'];?>" >
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">สีแผนก : </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control"  name="dep_color" value="<?php echo $show['dep_color'];?>">
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">เบอร์โทรศัพท์ : </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control"  name="dep_tel" value="<?php echo $show['dep_tel'];?>">
                                </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <div class="col-lg-6" style="text-align: right">
                                <input type="submit" class="btn btn-success col-4" name="save" value="ตกลง">
                            </div>
                            <div class="col-lg-6" style="text-align: left">
                                <a  class="btn btn-danger col-4"  href="dep.php" style="color:white; text-decoration-line: none;">ยกเลิก</a>
                            </div>
                        </div>

                    </form>
                  </div>
            </div>
          </div>
</div>
<br><br>
