<meta charset="utf-8">
<?php
  include '../connect.php';
  $Unit_id=$_GET['Unit_id'];
  $sql="DELETE FROM sport_unit WHERE Unit_id='$Unit_id'";

  if($con->query($sql)){
    echo "<script>
          alert('ลบข้อมูลสำเร็จ');
          window.location.href='unit.php'</script>";
  }else{
    echo "<script>
            alert('ไม่สามรถลบข้อมูลได้');
            window.location.href='unit.php';
            </script>";
  }

?>
