<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="estilo.css" />
		<link rel="stylesheet"  href = "reset.css" />
		<link rel="stylesheet"  href="text.css" />
		<link rel="stylesheet"  href="960.css" />
		<link href="jqueryUi/css/cupertino/jquery-ui-1.9.2.custom.css" rel="stylesheet">
	<script src="jqueryUi/js/jquery-1.8.3.js"></script>
	<script src="jqueryUi/js/jquery-ui-1.9.2.custom.js"></script>
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>teste</title>
		<meta name="author" content="Angelo" />
		<!-- Date: 2013-01-15 -->
	<script>
		$(document).ready(function() {
	
	$("#login").click(function() {
	
		var action = $("#form1").attr('action');
		var form_data = {
			username: $("#username").val(),
			password: $("#password").val(),
			is_ajax: 1
		};
		
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
				
				if(response == 'success')
						$("#message").html("<p class='success'>You have logged in successfully!</p>");
				else
					$("#message").html("<p class='error'>Invalid username and/or password.</p>");	
			}
		});
		
		return false;
	});
	
});
	</script>
		
	</head>
	<body>
		  <p>&nbsp;</p>
<div id="content">
  <h1>Login Form</h1>
  <form id="form1" name="form1" action="dologin.php" method="post">
    <p>
      <label for="username">Username: </label>
      <input type="text" name="username" id="username" />
    </p>
    <p>
      <label for="password">Password: </label>
      <input type="password" name="password" id="password" />
    </p>
    <p>
      <input type="submit" id="login" name="login" />
    </p>
  </form>
    <div id="message"></div>
</div>
	</body>
</html>

