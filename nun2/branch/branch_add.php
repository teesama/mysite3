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
    <title>เพิ่มข้อมูลสาขา</title>
</head>
<body>


<?php
require_once '../connect.php';
//error_reporting(0);
if(isset($_POST['add'])){
              $branch_id = $_POST['branch_id'];
              $branch_name = $_POST['branch_name'];
              $Unit_id = $_POST['Unit_id'];
              $dep_id = $_POST['dep_id'];
							$count=0;
							$sqlVal ="select branch_id from branch where branch_id='$branch_id'";
							$resultVal = $con->query($sqlVal);
							while ($row=mysqli_fetch_array($resultVal)) {
							$count++;
						}
						if($count>0){
                            echo "<script>alert('ไอดีนี้มีอยู่แล้ว')</script>";
                            }else {
								if($branch_id != "" && $branch_name != "" && $Unit_id != "" && $dep_id != ""){
									 $sql = "INSERT INTO branch (branch_id,branch_name,Unit_id,dep_id) VALUES ('$branch_id','$branch_name','$Unit_id','$dep_id')";
									$result = $con->query($sql);
								if($result){
									echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
									echo "<script>window.location.href='branch.php';</script>";
								}else {
									echo "<script>alert('เพิ่มข้อมูลล้มเหลว')</script>";
									echo "<script>window.location.href='branch.php';</script>";
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
          $dep_id= $fileop[0];
          $Color= $fileop[1];
          $sql = ("INSERT INTO branch VALUES ('$branch_id','$branch_name','$Unit_id','$dep_id')");
          if($con->query($sql)){
          echo "<script>alert('เพิ่มข้อมูลของสำเร็จแล้ว');
          window.location.href='dep.php';
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


<div class="container" style="width:700px;margin-top:40px;">
            <div class="card" style="background-Color: #ccc;">
                <div class="card-header   text-center"><h5 style="color: #000">เพิ่มข้อมูลสาขา</h5></div>
                		<div class="card-body" style="background-color: #fff">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">รหัสสาขา : </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control"  name="branch_id" placeholder="กรุณาใส่รหัสสาขา">
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">ชื่อสาขา : </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control"  name="branch_name" placeholder="กรุณาใส่ชื่อสาขา">
                                </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">หน่วยกีฬา </label>
                                <div class="col-lg-7">
                                   <select  name="Unit_id" class="form-control">
                                              <option>--เลือกหน่วยกีฬา--</option>
                                              <?php
                                                $sql = "SELECT * FROM sport_unit";
                                                $query = $con->query($sql);
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                  ?>
                                                  <option value="<?php echo $row2['Unit_id']; ?>"><?php echo $row2['Unit_name']; ?></option>
                                                  <?php
                                                }
                                               ?>
                                          </select>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">แผนก : </label>
                                <div class="col-lg-7">
                                  <select  name="dep_id" class="form-control">
                                             <option>--เลือกแผนก--</option>
                                             <?php
                                               $sql = "SELECT * FROM department";
                                               $query = $con->query($sql);
                                               while ($row2 = mysqli_fetch_array($query)) {
                                                 ?>
                                                 <option value="<?php echo $row2['dep_id']; ?>"><?php echo $row2['dep_name']; ?></option>
                                                 <?php
                                               }
                                              ?>
                                         </select>
                                </div>
                        </div>

                        <br>

                        <div class="form-group row">
                            <div class="col-lg-6" style="text-align: right">
                                <input type="submit" class="btn btn-success col-4" name="add" value="ตกลง">
                            </div>
                            <div class="col-lg-6" style="text-align: left">
                              <a  class="btn btn-danger col-4"  href="branch.php" style="color:white; text-decoration-line: none;">ยกเลิก</a>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
</div>
<br><br>
