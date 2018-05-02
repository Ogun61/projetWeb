<h2>Login administration</h2>
<?php
if(isset($_GET['submit_login'])){
    //pour pouvoir utiliser les donnes hors du tab $_get
    extract($_GET,EXTR_OVERWRITE);
    $log= new Admin_pensionbd($cnx);
    $admin=$log->getAdmin($admin, $password);
    //var_dump($admin);
    if(is_null($admin)){
        print "<br/>Données incorrectes";
    }
    else
    {
        $_SESSION['admin']=1;
        unset($_SESSION['page']);
        
        //print "<meta http-equiv=\"refresh\": Content=\"0;URL=../index.php\">";
    }
}
?>


<form action=""<?php print $_SERVER['PHP_SELF'];?> method="get">
    Login : 
    <input type="text" name="admin" id="admin"/><br/>
    Password : 
    <input type="password" name="password" id="password"/><br/>
    <input type="submit" name="submit_login" id="submit_login" value="Se connecter"/><br/>

</form>