<?php
/*
Template Name: Contact Form
*/
?>


<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = 'Indiquez votre nom.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = 'Indiquez une adresse e-mail valide.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'Adresse e-mail invalide.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError = 'Entrez votre message.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = 'me@somedomain.com';
			$subject = 'Formulaire de contact de '.$name;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'De : mon site <'.$emailTo.'>' . "\r\n" . 'R&eacute;pondre &agrave; : ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
				$subject = 'Formulaire de contact';
				$headers = 'De : <noreply@somedomain.com>';
				mail($email, $subject, $body, $headers);
			}

			$emailSent = true;

		}
	}
} ?>


<?php get_header(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/contact-form.js"></script>



<?php if(isset($emailSent) && $emailSent == true) { ?>

	<div class="thanks">
		<h1>Merci, <?=$name;?></h1>
		<p>Votre e-mail a &eacute;t&eacute; envoy&eacute; avec succ&egrave;s. Vous recevrez une r&eacute;ponse sous peu.</p>
	</div>

<?php } else { ?>

	<?php if (have_posts()) : ?>
	
	<?php while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
		
		<?php if(isset($hasError) || isset($captchaError)) { ?>
			<p class="error">Une erreur est survenue lors de l'envoi du formulaire.</p>
		<?php } ?>
	
		<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
	
			<ol class="forms">
				<li><label for="contactName">Nom</label>
					<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" />
					<?php if($nameError != '') { ?>
						<span class="error"><?=$nameError;?></span> 
					<?php } ?>
				</li>
				
				<li><label for="email">E-mail</label>
					<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />
					<?php if($emailError != '') { ?>
						<span class="error"><?=$emailError;?></span>
					<?php } ?>
				</li>
				
				<li class="textarea"><label for="commentsText">Message</label>
					<textarea name="comments" id="commentsText" rows="20" cols="30" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
					<?php if($commentError != '') { ?>
						<span class="error"><?=$commentError;?></span> 
					<?php } ?>
				</li>
				<li class="inline"><input type="checkbox" name="sendCopy" id="sendCopy" value="true"<?php if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> /><label for="sendCopy">Recevoir une copie du message</label></li>
				<li class="screenReader"><label for="checking" class="screenReader">Pour envoyer ce formulaire, ne saisissez RIEN dans ce champ</label><input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></li>
				<li class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit">Envoyer</button></li>
			</ol>
		</form>
	
		<?php endwhile; ?>
	<?php endif; ?>
<?php } ?>

<?php get_footer(); ?>