<meta charset="utf-8">
<?php
  include '../connect.php';
  $branch_id=$_GET['branch_id'];
  $sql="DELETE FROM branch WHERE branch_id='$branch_id'";

  if($con->query($sql)){
    echo "<script>
          alert('ลบข้อมูลสำเร็จ');
          window.location.href='branch.php'</script>";
  }else{
    echo "<script>
            alert('ไม่สามรถลบข้อมูลได้');
            window.location.href='branch.php';
            </script>";
  }

?>
