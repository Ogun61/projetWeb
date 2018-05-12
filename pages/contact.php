<?php if(isset($_POST['submit'])){
	if( $_POST['message']==" " ||  $_POST['pseudo']==" " || $_POST['email']==" "){
		$erreur=1;
		print "test";
	}
}
	
?>				
<section class="mbr-section form4 cid-qv5Aq4h3k3" id="form4-2y" data-rv-view="5142">

    

    
    <div class="container">
        <div class="row">
            <div class="col-md-6" id="maps">
                <div class="google-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2134.8214531579447!2d4.183761573402402!3d50.48309335182544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2364ba13ca11f%3A0x9a7dc0138fee0467!2sTaxis+Vingt-Six!5e0!3m2!1sfr!2sbe!4v1525684200008"  frameborder="0" style="border:0" allowfullscreen></iframe></div>
            </div>
            <div class="col-md-6">
                <h2 class="pb-3 align-left mbr-fonts-style display-2">
                    Contact
                </h2>
                <div>
                    <div class="icon-block pb-3">
                        <span class="icon-block__icon">
                            <span class="mbri-letter mbr-iconfont" media-simple="true"></span>
                        </span>
                        <h4 class="icon-block__title align-left mbr-fonts-style display-5">
                            N'hésitez pas à nous contacter
                        </h4>
                    </div>
                    <div class="icon-contacts pb-3">
                    
                        <p class="mbr-text align-left mbr-fonts-style display-7">
                            Phone: +1 (0) 000 0000 001 <br>
                            Email: youremail@mail.com
                        </p>
                    </div>
                </div>
                <div data-form-type="formoid">
                    <div data-form-alert="" hidden="">
                        Thanks for filling out the form!
                    </div>
                    <form class="block mbr-form form-active" action="https://mobirise.com/" method="post" data-form-title="Mobirise Form"><input type="hidden" data-form-email="true" value="44AuoOeYtJwJhCQAt1bwP6le5Z4RfRd5BZf43WsjSuwHcT0Qs78ZrHvX5++bPVZSjP2KWAwu7FMdyPJSg+JHFd9WHR94bYwVjv67MUE8EdCzbC0NmF20TCEyJMj7IT0z">
                        <div class="row">
                            <div class="col-md-6 multi-horizontal" data-for="name">
                                <input type="text" placeholder="Pseudo" name="pseudo" class="form-control" id="inputname" <?php if(isset($_POST['submit'])){if( $_POST['pseudo']==" "){echo "<span class=\"form_rouge\">Information manquante</span>";}} ?>>
                            </div>
                            <div class="col-md-6 multi-horizontal" data-for="email">
                                <input type="text" placeholder="Email" name="email" class="form-control" id="inputemail" <?php if(isset($_POST['submit'])){if( $_POST['email']==" "){echo "<span class=\"form_rouge\">Information manquante</span>";}} ?>>
                            </div>
                            <div class="col-md-12" data-for="message">
                                <textarea id="inputmessage" placeholder="Votre message" name="message" class="form-control" <?php if(isset($_POST['submit'])){if( $_POST['message']==" "){echo "<span class=\"form_rouge\">Information manquante</span>";}} ?>></textarea>
                            </div>
                            <div class="input-group-btn col-md-12" style="margin-top: 10px;">
                                <button type="submit" name="submit" class="btn btn-primary btn-form display-4">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
if(isset($_POST['submit'])){

		 $query="select * from client where pseudo='".$_POST['pseudo']."';";
		 $result="";
			if(sendquery($query,$cnx,$result)){
				getData($result,$tab);
				$nb=count($tab);
			}
			if($nb!=0){
				if(!isset($erreur)){
						$query="insert into contact(pseudo,email,message) values('".$_POST['pseudo']."','".$_POST['email']."','".$_POST['message']."');";
						if(sendData($query,$cnx)){
							$ajout=1;
							echo "<span class=\"form_rouge\">message envoyé</span>";
						}
						else{
							print "problème. message annulé";
						}
				}
			}
			else{ echo "<span class=\"form_rouge\">pseudo inconue</span>";}
}
?>

	