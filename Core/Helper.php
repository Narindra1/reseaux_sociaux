<?php
function dump($data) {  
    echo "<pre>";
    print_r($data);
    echo "<pre>";
}
function s(){
    dump(['session'=>$_SESSION["user"]]);
}
function redirect($url, $status = 0):void {

    header('Location: '.$url);
}

function isAuth() {
    if(isset($_SESSION) && isset($_SESSION["user"]) && $_SESSION["user"]) return $_SESSION["user"];
    redirect("/Login.php");exit();
}
function sessionAdd($user) {
    $_SESSION["user"] = $user;
}
function sessionRemove() {
    unset($_SESSION["user"]);
    // dump($_SESSION);
}






