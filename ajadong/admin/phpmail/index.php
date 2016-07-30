<?php 
session_start();
if(isset($_POST['Send']))
{
require_once('phpmail/class.phpmailer.php');
require_once('phpmail/class.smtp.php');
require_once('phpmail/PHPMailerAutoload.php');
$name=$_POST['uname'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['msg'];
$mail = new PHPMailer();
$body = file_get_contents('mailhh.php');
$body = str_replace("{user_name}", "$name", $body);
$body = str_replace("{email}", "$email", $body);
$body = str_replace("{msg}", "$message", $body);
$body = str_replace("{subject}","$subject", $body);
$body = str_replace("{url}", "<a href='http://awstechnosystem.com/rabbithop/hh_emailval.php?userid=".base64_encode($email)."'>http://awstechnosystem.com/rabbithop/hh_emailval.php?userid=".base64_encode($email)."</a>", $body);
//$from= str_replace("$from", $fromname);

//$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "www.awstechnosystem.com"; // SMTP server
//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;
$mail->SMTPSecure = 'tls';                  // enable SMTP authentication
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
$mail->Username   = "admin@awstechnosystem.com"; // SMTP account username
$mail->Password   = "gaurav@7777777";        // SMTP account password

$mail->SetFrom('admin@awstechnosystem.com', $fromname);

//$mail->AddReplyTo("noreply@awstechnosystem.com","First Last");

$mail->Subject    = "Email Verification for new Registraion";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML("$body");

//$address = "v.kapil1988@gmail.com";
$mail->AddAddress($email);
//var_dump($mail);
//$mail->Send();
//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
//$mail1->SMTPAuth   = true;
//$mail1->SMTPSecure = 'tls';                  // enable SMTP authentication
//$mail1->Port       = 587;                    // set the SMTP port for the GMAIL server

//$address = "v.kapil1988@gmail.com";
$mail->AddAddress($mail->Username);

	if($mail->Send())
	{
	
		echo '<script>alert("thank you for showing interest!!one of our executive will contact you shortly!!");</script>';
	}

	else
	{
		$error="Oops! Something wrong happened!!please try again..";
	}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BELLROSS CROWN CAPITAL SOLUTIONS</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
  <div class="header">
    <div class="wrapper">
      <div class="logo"><a href="index.html"><img src="images/logo.jpg"></a></div>
      <div class="menu">
        <p><a href="index.html">HOME</a><a href="about.html">ABOUT US</a><a href="industries.html">INDUSTRIES</a><a href="services.html">SERVICES</a><a href="contacts.html">CONTACT US</a></p>
      </div>
    </div>
  </div>
</header>
<section>
  <div class="section">
    <div class="wrapper">
      <div class="banner_sec">
        <div class="banner"><img src="images/banner.jpg" alt="" width="612" height="254"></div>
        <div class="Services_sec">
          <h2>Services</h2>
          <ul>
            <li><a href="#">Arbitration </a></li>
            <li><a href="#">Asset Restructuring</a></li>
            <li><a href="#">Liquidity and Debt Restructuring</a></li>
            <li><a href="#">Advisory Services - Post-acquisition Disputes</a></li>
            <li><a href="#">Class Action Disputes </a></li>
            
          </ul>
        </div>
      </div>
      <div class="home_content_sec">
      	<div class="content1">      	  
          <h2 class="blue">DISPUTE ADVISORY SERVICES&amp; Asset – Debt  Restructuring</h2>
          <p><strong>BELLROSS CROWN CAPITAL SOLUTIONS</strong> is a global business advisory firm dedicated to helping clients solve  complex debt and asset restructuring settlements and disputes, forensic  accounting, loan modifications, valuation – financial issues, life insurance  settlements and resolve commercial disputes.<br>
Because  challenges never cease, our engagements often involve the role of trusted  advisor. Numerous client relationships have endured through the turbulence of  business and economic cycles. And many of our new engagements come from  existing clients — a testament to our ability to consistently deliver results.</p>
          <p><img src="images/content.jpg" width="590" height="535"></p>
          <p> We  believe that effective management and resolution of&nbsp;disputes&nbsp;requires  the early collaboration of specialists. Our forensic accountants, valuation  experts and dispute consulting professionals are used to collaborating with  other experts to deliver expert, pragmatic advice in the most cost-effective  way. We are committed to performing meaningful analysis from day one,  communicating our insights clearly and giving well-reasoned advice right  through to resolution. <br>
            We give clarity to the  complex, so you can act with confidence.</p>
          <p>&nbsp;</p>
      	</div>
        <div class="news_sec">
          <h3>News</h3>
          <p>&nbsp;</p>
          <p> I'm a paragraph. Click here   to add your own text and edit me. I’m a great place for you to tell a   story and let your users know a little more about you.</p>
          <p align="right" class="blue"> July 12, 2023</p>
          <p>I'm a paragraph. Click here   to add your own text and edit me. I’m a great place for you to tell a   story and let your users know a little more about you.</p>
          <p align="right" class="blue"> July 12, 2023</p>
          <p>I'm a paragraph. Click here   to add your own text and edit me. I’m a great place for you to tell a   story and let your users know a little more about you.</p>
          <p align="right" class="blue"> July 12, 2023</p>
          <p>I'm a paragraph. Click here   to add your own text and edit me. I’m a great place for you to tell a   story and let your users know a little more about you.</p>
          <p align="right" class="blue"> July 12, 2023</p>
          <p>I 'm a paragraph. Click here   to add your own text and edit me. I’m a great place for you to tell a   story and let your users know a little more about you.</p>
          <p align="right" class="blue"> July 12, 2023</p>

          <p align="right" class="blue">&nbsp;</p>
        </div>
      </div>
    </div>
    <div class="blue_service_sec">
    	<div class="wrapper">
    	  <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center">FORENSIC ACCOUNTING 
& <br>
INVESTIGATIONS</td>
              <td align="center">INSURANCE CLAIMS & <br>
              RISK ANALYSIS           </td>
              <td align="center">DISPUTE CONSULTING 
& <br>
CORPORATE ADVISORY</td>
              <td align="center">ASSET & DEPT 
                <br>
              RESTRUCTURING</td>
            </tr>
          </table>
    	</div>
    </div>
    <div class="service_content_sec">
   	  <div class="wrapper">
       	  <div class="content2"> 
        	  <h2>Our services:</h2>
        	  <p> »Arbitration<br>
        	    »Asset Restructuring <br>
        	    »Loan Modification<br>
        	    »Liquidity and Debt Restructuring <br>
        	    »Advisory Services 
                <br>
                »Accountant Malpractice Claims <br>
                »Damages Analysis 
                <br>
                »Class Action Disputes <br>
                »Expert Testimony
                <br>
                »General and Commercial Dispute Services»Post-acquisition Disputes
                <br>
                »Valuation<br>
                »Securities Lending
&nbsp;</p>
       	    <p align="left" class="blue"><strong>Our professionals are some of the  world’s most experienced leaders drawn from the following ranks:</strong></p>
       	    <ul type="disc">
                <li>Certified turnaround professionals</li>
        	    <li>Forensic       accountants</li>
        	    <li>Corporate investigation       specialists</li>
        	    <li>Intellectual       property specialists</li>
        	    <li>Former political       leaders</li>
        	    <li>Construction specialists</li>
       	      <li>Real       estate professionals</li>
                <li>Former chief executives</li>
        	    <li>Banking and securities professionals</li>
        	    <li>Certified public accountants</li>
        	    <li>Corporate, financial and crisis  communications specialists</li>
        	    <li>Chartered financial analysts</li>
      	    </ul>
        	  <p>&nbsp;</p>
       	  </div>
          <div class="contact_from"> 
            <h3>Contact us</h3>
            <p>&nbsp;</p>
            <p>
			<form action="" method="post">
              <input name="uname" type="text" class="input" placeholder="Name" id="textfield" value="">
              <br>
              <input name="email" type="text" class="input" placeholder="Email" id="textfield2" value="">
              <br>
              <input name="subject" type="text" class="input"  placeholder="Subject" id="textfield3" value="">
              <br>
              <textarea name="msg" cols="45" rows="5" class="input" placeholder="Message" id=""></textarea>
              <br>
              <input name="Send" type="submit" class="submit" id="button" value="Send">
			  </form>
            </p>
          </div>
        </div>
    </div>
  </div>
</section>
<footer>
	<div class="footer">
    	<div class="wrapper">
        	<div class="f1">
        	  <p><strong>Address:</strong><br>
				2601 Mission St.San Francisco, <br>
				CA 94110:</p>
        	  <p>        	    Tel: +44 (0) 203 5193472<br>
       	      Email: <a href="mailto:Office@bellross-ccf.com">Office@bellross-ccf.com</a> </p>
        	  <p>© 2015 by BELLROSS CROWN CAPITAL SOLUTIONS.<br>
        	  </p>
       	  </div>
            <div class="f2">
              <p><a href="#"><img src="images/facebook.jpg" alt="" width="23" height="23"></a> <a href="#"><img src="images/google.jpg" alt="" width="23" height="23"></a> <a href="#"><img src="images/tweeter.jpg" alt="" width="23" height="23"></a> <a href="#"><img src="images/in.jpg" alt="" width="23" height="23"></a></p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
