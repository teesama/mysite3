<meta charset="utf-8">
<?php
  include '../connect.php';
  $dep_id=$_GET['branch_id'];
  $sql="DELETE FROM department WHERE dep_id='$dep_id'";

  if($con->query($sql)){
    echo "<script>
          alert('ลบข้อมูลสำเร็จ');
          window.location.href='dep.php'</script>";
  }else{
    echo "<script>
            alert('ไม่สามรถลบข้อมูลได้');
            window.location.href='dep.php';
            </script>";
  }

?>
