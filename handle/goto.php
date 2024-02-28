<?php
require_once '../inc/connection.php';
require_once '../App.php';

if ($request->check($request->get("status")) && $request->check($request->get("id")) ) {
        $id = $request->get("id");
        $status = $request->get("status");
        $runQuery = $con->prepare("SELECT * FROM `todo` WHERE `id` = :id");
        $runQuery->bindParam(":id" , $id , PDO::PARAM_INT);
        $runQuery->execute();
        if ($runQuery->rowCount() == 1) {
        $runQuery = $con->prepare("UPDATE `todo` SET `status`=:st WHERE `id` = :id");
        $runQuery->bindParam(":st" , $status , PDO::PARAM_STR);
        $runQuery->bindParam(":id" , $id , PDO::PARAM_INT);
        $result = $runQuery->execute();
        if ($result) {
            $session->set("success" , "status updated successfully");
            $request->redirect("../index.php");
        }else{
            $session->set("errors" , ["error while updating"]);
            $request->redirect("../index.php");
        }
    }else{
        $session->set("errors" , ["todo not found"]);
        $request->redirect("../index.php");
    }
}else{
    $request->redirect("../index.php");
}
?>
