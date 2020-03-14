


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<table class="table" style="text-align:center;">
    <tr>
        <th>
            <input type="text" name="id" placeholder="กรอกชื่อนักศึกษา" id="id">
            <input type="submit" value="ค้นหา" name="submit" class="btn btn-info"> 
            <a href="student_add.php" class="btn btn-warning">+เพิ่ม</a>
        </th>
    </tr>
</table>
</form>


    <?php   if(isset($_POST['submit'])){?>
    <?php   $id = $_POST['id']; 
            $strSQL = "SELECT * FROM student s, major m , level l WHERE m.Major_id=s.Major_id and s.Level_id=l.Level_id AND s.Stu_id LIKE '%$id%'";
            $sql = mysqli_query($con,$strSQL);
            $i = 1;
                ?>
    <?php   }else{?>
    <?php   $strSQL = "SELECT * FROM student s, major m , level l WHERE m.Major_id=s.Major_id and s.Level_id=l.Level_id";
            $sql = mysqli_query($con,$strSQL);
            $i = 1;
                ?>
    <?php   }   ?>
    <table class="show_student table">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>รหัสนักศึกษา</th>
            <th>ชื่อ - นามสกุล</th>
            <th>แผนก</th>
            <th>ระดับชั้น</th>
            <th>แก้ไข</th>
        </tr>
    </thead>
    <tbody>
        <?php
            
            while($row = $sql->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['Stu_id'];?></td>
            <td><?php echo $row['Name_title']." ".$row['Stu_name']." ".$row['Stu_lastname']; ?></td>
            <td><?php echo $row['Major_name']; ?></td>
            <td><?php echo $row['Level_name']; ?></td>
            <td>
                <a href="student_edit.php?id=<?php echo $row['Stu_id']; ?>" class="btn btn-info">แก้ไข</a>
                <a href="student_del.php?id=<?php echo $row['Stu_id']; ?>" class="btn btn-danger">ลบ</a>
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
