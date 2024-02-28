<?php
require_once '../inc/connection.php';
require_once '../App.php';

if ($request->check($request->get("id")) ) {
        $id = $request->get("id");
        $runQuery = $con->prepare("SELECT * FROM `todo` WHERE `id` = :id");
        $runQuery->bindParam(":id" , $id , PDO::PARAM_INT);
        $runQuery->execute();
        if ($runQuery->rowCount() == 1) {
            $runQuery = $con->prepare("DELETE FROM `todo` WHERE `id` = :id");
            $runQuery->bindParam(":id" , $id , PDO::PARAM_INT);
            $result = $runQuery->execute();
            if ($result) {
                $session->set("success" , "todo deleted successfully");
                $request->redirect("../index.php");
            }else{
                $session->set("errors" , ["error while deleting"]);
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
