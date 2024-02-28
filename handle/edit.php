<?php
require_once '../inc/connection.php';
require_once '../App.php';

if ($request->check($request->post("submit")) && $request->check($request->get("id")) ) {
    $id = $request->get("id");
    $title = $request->filter($request->post("title"));
    $validation->endValidate("title", $title , ['required' , 'str']);
    $errors = $validation->getError();
    if (empty($errors)) {
        $runQuery = $con->prepare("UPDATE `todo` SET `title`=:title WHERE `id` = :id");
        $runQuery->bindParam(":title" , $title , PDO::PARAM_STR);
        $runQuery->bindParam(":id" , $id , PDO::PARAM_INT);
        $result = $runQuery->execute();
        if ($result) {
            $session->set("success" , "todo updated successfully");
            $request->redirect("../edit.php");
        }else{
            $session->set("errors" , ["error while updating"]);
            $request->redirect("../edit.php?id=$id");
        }
    }else{
        $session->set("errors" , $errors);
        $request->redirect("../edit.php?id=$id");
    }


}else{
    $request->redirect("../index.php");
}
