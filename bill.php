<?php 
include("includes/common.php");
if (! isset($_SESSION['email'])) {
  header('location: index.php');
}


if(isset($_POST['bill'])){
    $expense_id = ($_POST['bill']);
    $que = "SELECT bill FROM expense WHERE expense_id = '$expense_id'";
    $res = mysqli_query($con, $que)or die($mysqli_error($con));
    $img = mysqli_fetch_array($res);
    $img_src = $img['bill'];
}

?>

<div class="img-block">
    <center> 
        <h2>Your Bill Image </h2> <br> 
        <img src="data:image/png;base64,<?php echo ($img_src); ?>" alt="Bill Image" title="bill_image" width="1000" height="500" class="img-responsive" />
    </center>
</div>

 
<script src="./removeBanner.js"></script>
