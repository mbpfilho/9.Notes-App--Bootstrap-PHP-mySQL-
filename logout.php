<?php
if(isset($_SESSION["user_id"]) && $_GET["logout"]==1){
    //delete authentificators from table
    // prepare variables
    // $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    // $id=$row["id"];
    $id=$_SESSION["id"];
    // $userid=$_SESSION["user_id"];
    // $sql="DELETE FROM rememberme WHERE user_id='$userid'";
    $sql="DELETE FROM rememberme WHERE id='$id'";
    $result=mysqli_query($link,$sql);
    if(!$result){
        // echo "<div class='alert alert-danger'><p>Query error deleting from rememberme table.</p><p>".mysqli_error($link)."</p></div>";
        echo '<script>alert("Query error deleting from rememberme table.")</script>';
        exit;
    }
    //destroy session
    session_destroy();
    //destroy cookie
    setcookie("rememberme","",time()-3600);
}
?>