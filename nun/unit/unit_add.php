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
require_once '../connect.php';
//error_reporting(0);
if(isset($_POST['add'])){
							$Unit_number = $_POST['Unit_number'];
              $Unit_name = $_POST['Unit_name'];
							$Color = $_POST['Color'];
							$count=0;
							$sqlVal ="select Unit_number from sport_unit where Unit_number='$Unit_number'";
							$resultVal = $connect->query($sqlVal);
							while ($row=mysqli_fetch_array($resultVal)) {
							$count++;
						}
						if($count>0){
                            echo "<script>alert('ไอดีนี้มีอยู่แล้ว')</script>";
                            }else {
								if($Unit_number != ""&&$Unit_name != ""&&$Color != ""){
									 $sql = "INSERT INTO sport_unit (Unit_number,Unit_name,Color) VALUES ('$Unit_number','$Unit_name','$Color')";
									$result = $connect->query($sql);
								if($result){
									echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
									echo "<script>window.location.href='unit.php';</script>";
								}else {
									echo "<script>alert('เพิ่มข้อมูลล้มเหลว')</script>";
									echo "<script>window.location.href='unit.php';</script>";
									  }
								}else{
									echo "<script>alert('กรุณากรอกข้อมูลให้ครบ !')</script>";
								}
									};
                                }

if(isset($_POST['btnSubmitEmp'])){
  $file = $_FILES['fileCSV']['tmp_name'];
  $handle = fopen($file,"r");
  while(($fileop = fgetcsv($handle,1000,",")) !== false)
      {
          $Unit_number= $fileop[0];
          $Color= $fileop[1];
          $sql = ("INSERT INTO sport_unit VALUES ('$Unit_number','$Color','$Unit_name')");
          if($connect->query($sql)){
          echo "<script>alert('เพิ่มข้อมูลของสำเร็จแล้ว');
          window.location.href='unit.php';
          </script>";
          }else {
          echo "<script>
          alert('ERROR : ไม่สามารถบันทึกข้อมูลได๋');
          window.history.back();
          </script>";
          }

      }
    }
 ?>
</style>


<div class="container" style="width:700px;margin-top:40px;   ">
            <div class="card">
                <div class="card-header   text-center"><h5 style="color: #5c9dc0">เพิ่มข้อมูลหน่วยกีฬา</h5></div>
                		<div class="card-body" style="background-color: #F5FFFA">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">รหัสหน่วยกีฬา: </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control"  name="Unit_number" placeholder="กรุณาใส่รหัสหน่วย">
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">ชื่อหน่วยกีฬา: </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control"  name="Unit_name" placeholder="กรุณาใส่ชื่อหน่วย">
                                </div>
                        </div>
                        <div class="row">
                          <label class="col-lg-4 col-form-label">สี: </label>
                          <div class="col">
                            <input type="text"style="width:170px;" class="form-control" placeholder="สี" name="Color">
                          </div>
                        </div>

                        <br>
                        </div>


                        <div class="form-group row">
                            <div class="col-lg-6" style="text-align: right">
                                <input type="submit" class="btn btn-success col-4" name="add" value="ตกลง">
                            </div>
                            <div class="col-lg-6" style="text-align: left">
                              <a  class="btn btn-danger col-4"  href="unit.php" style="color:white; text-decoration-line: none;">ยกเลิก</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

<br><br>
</div>
</body>
</html>
