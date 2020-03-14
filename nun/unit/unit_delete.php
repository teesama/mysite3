<meta charset="utf-8">
<?php
  include '../connect.php';
  $Unit_number=$_GET['Unit_number'];
  $sql="DELETE FROM sport_unit WHERE Unit_number='$Unit_number'";

  if($connect->query($sql)){
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
