<?php
include '../../Config/conect.php';
session_start();
if (isset($_POST['btnsave'])) {
    $empcode = $_POST['empcode'];
    $empname = $_POST['empname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $salary = $_POST['salary'];
    $pos = $_POST['Position'];
    $branch = $_POST['Branch'];
    $Dept = $_POST['Department'];
    $stafftype = $_POST['stafftype'];
    $status = $_POST['status'];
    $pob = $_POST['pob'];
    $add = $_POST['Address'];
    $phone = $_POST['Phone'];
    //upload img
    $fileName=$_FILES['photo']['name'];
    $tmp_name=$_FILES['photo']['tmp_name'];
    $pathfile='../../Upload/StaffPic/';
    move_uploaded_file($tmp_name,$pathfile.$fileName);

    if ($empcode== "" && $empname == "") {
        $_SESSION['msg'] = " Employee code  and Employee name  can not be empty!";
        $_SESSION['color'] = "alert-warning";
        header("location:../../view/StaffProfile/index.php");
    } else {
        $sql = " INSERT INTO `emp_staffprofile` 
        (`empcode`, `empname`, `gender`, `dob`, `pob`, `phone`, `address`, `basic_salary`, `position`, `department`, `branch`, `stafftype`, `photo`, `Status`)
        VALUES ('$empcode', '$empname', '$gender', '$dob', '$pob', '$phone', '$add', '$salary', '$pos', '$Dept', '$branch', '$stafftype', '$fileName', '$status');";
        $res = $con->query($sql);
        if ($res == true) {
            $_SESSION['msg'] = "Data have been saved.";
            $_SESSION['color'] = "alert-success";
            header("location:../../view/StaffProfile/index.php");
        }
    }
}



if(isset($_POST['btnUpdate'])){
    $empcode = $_POST['empcode'];
    $empname = $_POST['empname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $salary = $_POST['salary'];
    $pos = $_POST['Position'];
    $branch = $_POST['Branch'];
    $Dept = $_POST['Department'];
    $stafftype = $_POST['stafftype'];
    $status = $_POST['status'];
    $pob = $_POST['pob'];
    $add = $_POST['Address'];
    $phone = $_POST['Phone'];
    //upload img
    $fileName=$_FILES['photo']['name'];
    $tmp_name=$_FILES['photo']['tmp_name'];
    $pathfile='../../Upload/StaffPic/';
    move_uploaded_file($tmp_name,$pathfile.$fileName);
    $UPDATE="UPDATE `emp_staffprofile` 
    SET 
    `empname` = '$empname', 
    `gender` = '$gender', 
    `dob` = '$dob', 
    `pob` = '$pob', 
    `phone` = '$phone', 
    `address` = '$add', 
    `basic_salary` = '$salary', 
    `position` = '$pos', 
    `department` = '$Dept', 
    `branch` = '$branch', 
    `stafftype` = '$stafftype', 
    `photo` = '$fileName', 
    `Status` = '$status' 
    WHERE `emp_staffprofile`.`empcode` = '$empcode';";
    $res = $con->query($UPDATE);
    if ($res == true) {
        $_SESSION['msg'] = "Data have been updated.";
        $_SESSION['color'] = "alert-success";
        header("location:../../view/StaffProfile/index.php");
    }
}
?>