<!-- head -->
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
    <link rel="stylesheet" href="css/mycss.css">
</head>
<body>

<title>ระบบจัดการการแข่งขันกีฬาภายในวิทยาลัยเทคนิคสัตหีบ</title>
<div class="container">

    <!-- navbar -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">ระบบจัดการการแข่งขันกีฬาภายในวิทยาลัยเทคนิคสัตหีบ</a>
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

    <!-- ปุ่มเมนู -->
    <div class="row">
      <div class="col-md-6">
        <div class="service-box">
          <div class="row">
            <div class="col-3">
              <i class="fa fa-id-card-o" aria-hidden="true"></i>
            </div>
            <div class="col-9">
              <h3><a href="../nun/unit/unit.php">จัดการหน่วยกีฬา</a></h3>
              <p>จัดการแก้ไขข้อมูลหน่วยกีฬา</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="service-box">
          <div class="row">
            <div class="col-3">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </div>
            <div class="col-9">
              <h3><a href="../nun/student/student.php">ข้อมูลนักศึกษา</a></h3>
              <p>แสดงข้อมูลนักศึกษา</p>
            </div>
          </div>
        </div>
      </div>

            <div class="col-md-6">
        <div class="service-box">
          <div class="row">
            <div class="col-3">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </div>
            <div class="col-9">
              <h3><a href="../nun/department/dep.php">จัดการข้อมูลแผนก</a></h3>
              <p>จัดการแก้ไขข้อมูลแผนก</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="service-box">
          <div class="row">
            <div class="col-3">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </div>
            <div class="col-9">
              <h3><a href="../nun/branch/branch.php">จัดการข้อมูลสาขา</a></h3>
              <p>จัดการแก้ไขข้อมูลสาขา</p>
            </div>
          </div>
        </div>
            </div>

      <div class="col-md-6">
        <div class="service-box">
          <div class="row">
            <div class="col-3">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </div>
            <div class="col-9">
              <h3><a href="team/player.php">จัดการกีฬา</a></h3>
              <p>จัดการแก้ไข การแข่งขัน</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="service-box">
          <div class="row">
            <div class="col-3">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </div>
            <div class="col-9">
              <h3><a href="#">จัดการนักกีฬา</a></h3>
              <p>จัดการแก้ไข นักกีฬา</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="service-box">
          <div class="row">
            <div class="col-3">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </div>
            <div class="col-9">
              <h3><a href="#">จัดการนักกีฬา</a></h3>
              <p>จัดการแก้ไข นักกีฬา</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="service-box">
          <div class="row">
            <div class="col-3">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </div>
            <div class="col-9">
              <h3><a href="#">จัดการนักกีฬา</a></h3>
              <p>จัดการแก้ไข นักกีฬา</p>
            </div>
          </div>
        </div>
      </div>
    </div>


<hr>
    <!-- ใช้โชว์ตารางการแข่ง -->
    <?php //include 'show_match.php'; ?>
</div>
</body>
</html>
