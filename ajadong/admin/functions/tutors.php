<link rel="stylesheet" type="text/css" href="stylesheets/jquery.validate.css" />
        <link rel="stylesheet" type="text/css" href="./stylesheets/style.css" />
        <script src="lib/jquery/jquery-1.3.2.js" type="text/javascript">
        </script>
        <script src="javascripts/jquery.validate.js" type="text/javascript">
        </script>
        <script src="javascripts/jquery.validation.functions.js" type="text/javascript">
        </script>
        
<script type="text/javascript">
//--------------------------------------------------------------------
	 
function emailvalidate()
	 {
		 var email=document.getElementById('emailTutor').value;
		 if(email!="" && email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
		 {		 //alert(email);
			 $.ajax({
				 type: "POST",
				 data: {email: email},
				 url: "emailvalidate.php",
				 success: function(msg){
					 //alert(msg);
					 if(msg=='available'){
						 //alert("hi");
						$("#msgem").hide();
						$("#msgem1").show();
						
					 }else{
						 //alert("hello");
						$("#msgem1").hide();
		 				$("#msgem").show(); 
						document.getElementById('emailTutor').value='';
					 }
					 }
				 });		
		 }
		 else
		  {
		  $("#msgem1").hide();
		  $("#msgem").show();
		  }
	}
	
	function emailvalidate111()
	 {
		 var email=document.getElementById('emailTutor111').value;
		 if(email!="")
		 {		 //alert(email);
			 $.ajax({
				 type: "POST",
				 data: {email: email},
				 url: "emailvalidate111.php",
				 success: function(msg){
					 //alert(msg);
					 if(msg=='available'){
						 //alert("hi");
						$("#msgem").hide();
						$("#msgem1").show();
						
					 }else{
						 //alert("hello");
						$("#msgem1").hide();
		 				$("#msgem").show(); 
						document.getElementById('emailTutor111').value='';
					 }
					 }
				 });		
		 }
		 else
		  {
		  $("#msgem1").hide();
		  $("#msgem").show();
		  }
	}
	
	
	function emailvalidate1()
	 {
		 var email=document.getElementById('emailTutor1').value;
		 if(email!="")
		 {		 
			 $.ajax({
				 type: "POST",
				 data: {email: email},
				 url: "emailvalidateS.php",
				 success: function(msg){
					 //alert(msg);
					 if(msg=="available"){
						 //alert("hi");
						$("#msgemu").hide();
						$("#msgem1u").show();
						
					 }else{
						 //alert("hello");
						$("#msgem1u").hide();
		 				$("#msgemu").show(); 
						document.getElementById('emailTutor1').value='';
					 }
					 }
				 });		
		 }
		 else
		  {
		  $("#msgem1u").hide();
		  $("#msgemu").show();
		  }
	}
	
	
		function passvalidate()
	 {	 
		var pass=document.getElementById('passworduser').value;
		var cpass=document.getElementById('cpasswordUser').value;
		var len=pass.length;
//var patt = new RegExp(/^(?=.*[a-zA-Z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{7,19}$/);
var patt = new RegExp(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,19})$/);
		var res = patt.test(pass);
		if(len>=8 && res==true){
			
			$("#pc").show();
				$("#pw").hide();
			}
			else
			{
				 $("#pw").show();
				$("#pc").hide();
				document.getElementById('passworduser').value='';
				document.getElementById('cpasswordUser').value='';
				$("#cpw").hide();
				$("#cpc").hide();
				}
	}	 
	function onFocusev()
	{
		document.getElementById('cpasswordUser').value='';
				document.getElementById('passworduser').value='';
		
		}
	//password validate functon for ragister a user----------------------- 
	function conformval()
		{	 
				var cpass=document.getElementById('cpasswordUser').value;
				var pass=document.getElementById('passworduser').value;
				var len=cpass.length;
		if(len>=6 && len!=0)
			{
				if(cpass==pass)
			 			{
							$("#cpc").show();
							$("#cpw").hide();
		 				}
				 else
		 				{
							$("#cpw").show();
							$("#cpc").hide();
							document.getElementById('cpasswordUser').value='';
						}
			}
		else
			{
				$("#cpw").show();
				$("#cpc").hide();
				document.getElementById('cpasswordUser').value='';
			}
		}
		
		function mobilevalidate()
	 {	  
		var mobile=document.getElementById('telephoneUser').value;
		if(mobile!="" && mobile.length <= 15)
		 {
			$("#mw").hide();
			$("#mc").show();
		 }
		 else
		 {
		  $("#mc").hide();
		  $("#mw").show();
		  document.getElementById('telephoneUser').value='';
		 }
		
    }
	 function firstname()
	 {
         var val=document.getElementById('firstnameTutor').value;
		 if(val!="")
		 {
		  $("#uwrong").hide();
		  $("#uc").show();
		 }
		 else
		 {
			$("#uc").hide();
			$("#uwrong").show();
		 }
	}
	function lastname()
	 {
         var val=document.getElementById('lastnameTutor').value;
		 if(val!="")
		 {
		  $("#lwrong").hide();
		  $("#lc").show();
		 }
		 else
		 {
			$("#lc").hide();
			$("#lwrong").show();
		 }
	}
	function passvalidate11()
	 {	 
		var pass=document.getElementById('passwordTutor').value;
		if(pass!="" && pass.length>6)
		 {
			$("#pw").hide();
			$("#pc").show();
		 }
		 else
		 {
		  $("#pc").hide();
		  $("#pw").show();
		 }
	}	 	
	
	//------------------------------------------------------------------------------------
	function coursecoupon()
	 {
		 var email=document.getElementById('CouponsNumber').value;
		 if(email!="" && email.match(/^[0-9a-zA-Z]+$/))
		 {		 //alert(email);
			 $.ajax({
				 type: "POST",
				 data: {email: email},
				 url: "coursechecker.php",
				 success: function(msg){
					 //alert(msg);
					 if(msg=='available'){
						 //alert("hi");
						$("#msgem").hide();
						
						document.getElementById("CouponsNumber").style.borderColor = "green";
					 }else{
						 //alert("hello");
						$("#msgem1").hide();
		 				$("#msgem").show(); 
						document.getElementById('CouponsNumber').value='';
						document.getElementById("CouponsNumber").style.borderColor = "red";
					 }
					 }
				 });		
		 }
		 else
		  {
		 
		  document.getElementById('CouponsNumber').value='';
						document.getElementById("CouponsNumber").style.borderColor = "red";
		  }
	}
//----------------------------------------------------------------------------------------------------------	
	</script>
