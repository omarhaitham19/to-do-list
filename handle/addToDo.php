<?php
require_once "../App.php";
require_once "../inc/connection.php";

if ($request->check($request->post("submit"))) {

    $title = $request->filter($request->post("title"));
    $validation->endValidate("title" , $title , ['required' , 'str']);
    $errors = $validation->getError();

    if (empty($errors)) {
        $stmt = $con->prepare("INSERT INTO `todo`(`title`) VALUES (:title)");
        $stmt->bindParam(":title" , $title , PDO::PARAM_STR);
        $result =  $stmt->execute();
        if ($result) {
            $session->set("success" , "Data inserted successfully");
            $request->redirect("../index.php");
        }else{
            $session->set("errors" , "error while insert");
            $request->redirect("../index.php");
        }
     }else{
        $session->set("errors" , $errors);
        $request->redirect("../index.php");
    }


    
}else{
    $request->redirect("../index.php");
}


// validate

// insert 

// errors

