<?php include 'head.php'; ?>
<?php include 'connect.php'; ?>
<div class="container">
<?php include 'navbar.php'; ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<table class="table" style="text-align:center;">
    <thead>
        <tr>
            <th>เลือกแผนก</th>
            <th>เลือกประเภทกีฬา</th>
            <th>เลือกกีฬา</th>
        </tr>
    </thead>
    <?php
    $strSQL = "SELECT * FROM department";
    $SQL = mysqli_query($con,$strSQL);
    $strSQL2 = "SELECT * FROM sport_type";
    $SQL2 = mysqli_query($con,$strSQL2);
    $strSQL3 = "SELECT * FROM sport";
    $SQL3 = mysqli_query($con,$strSQL3);
    ?>
    <tbody>
        <tr>
            <td>
                <select name="dep_id" id="dep_id">
                    <?php   while($row = $SQL->fetch_assoc()){?>
                
                    <option value="<?php echo $row['Dep_id'] ?>"><?php echo $row['Dep_name']; ?></option>
                
                    <?php   }?>
                </select>
            </td>
            <td>
                <select name="sportt_id" id="sportt_id">
                    <?php   while($row2 = $SQL2->fetch_assoc()){?>
                
                    <option value="<?php echo $row2['SportType_id'] ?>"><?php echo $row2['SportType_name']; ?></option>
                
                    <?php   }?>
                </select>
            </td>
            <td>
                <select name="sport_id" id="sport_id">
                    <?php   while($row3 = $SQL3->fetch_assoc()){?>
                
                    <option value="<?php echo $row3['Sport_id'] ?>"><?php echo $row3['Sport_name']; ?></option>
                
                    <?php   }?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan=3> <input type="submit" value="เลือก" class="btn btn-warning"> </td>
        </tr>
    </tbody>
</table>
</form>
<?php
    if(isset($_POST['submit'])){
        echo "yes";
        echo "Dep = <br>";
        echo "Sport Type = <br>";
        echo "Sport = <br>";
    }else{
        echo "no";
    }
    
?>
<table class="table">
    <thead>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>




</div>
</body>
</html>