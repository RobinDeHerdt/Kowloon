<!-- <html>
<head>
	<style>
		@font-face {
		    font-family: choplin;
		    src: url(/fonts/Choplin-Medium.otf);
		}

		body {
			width: 100%;
			height: 100%;
			margin: 0;
			padding: 0;
			background-color: #323232;
			color: white;
			font-size: 18px;
			text-align: center;
			font-family: arial;
		}

		.container {
			position: relative;
			width: 60%;
			padding: 2.5%;
			left: 17.5%;
			top: 5%;
			background-color: #454545;
			margin-bottom: 2.5%;
		}
		img {
			display: block;
		}
		.carousel {
			min-width: 100%;
		}

		.plaatsmaker {
			height: 2.5%;
		}

		.logo {
			left: 37.5%;
			width: 25%;
			top: 10%;
			position: absolute;
		}

		h1 {
			font-family: choplin;
		}
	</style>
</head>
<body>
		<img src="/img/logo.png" class="logo">
		<img src="/img/carousel-3.png" class="carousel">
		<div class="container">
			<h1>Hallo!</h1>

			<p>Bedankt om je in te schrijven voor onze nieuwsbrief</p>

			<p>Doei</p>
			<div class="plaatsmaker"></div>
			<hr>
			<br>
			<i>Kowloon 2016</i>
		</div>
</body>
</html> -->
<!DOCTYPE html>
<html>
<head>
	<title>HTML Email</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<style type="text/css">
		* {
			/*font-family: Circular Std Bold;*/
			font-family: 'Montserrat', sans-serif;
			color: #4b4b4b;
		}
	</style>
</head>
<body margin="0" padding="0">
	<table width="100%" bgcolor="white" cellspacing="0" cellpadding="0" border="0">
			<tr>
				<td width="100%"  align="center">
					<table width="650" bgcolor="white" cellspacing="0" cellpadding="0" border="0">
						<tr align="center" style="position:absolute; width: 70%; left: 15%; top: 5%;">
							<td><img width="250" height="auto" src="/img/logo.png"></td>
						</tr>
						<tr>
							<td height="225" width="650" style="background-image: url(/img/carousel-3.png); background-position: 50% 40%; background-size: cover;">
							</td>
						</tr>
						<tr>
							<td width="550" align="center">
								<p align="left" style="color:black">
									Hallo,
								</p>
								<br>
								<p align="left" style="color:black">
									Bedankt om je in te schrijven voor onze nieuwsbrief!
								</p>
								<br>
								<p align="left" style="color:black">
									Met vriendelijke groeten, <br>
									Het Kowloon team.
								</p>
							</td>
						</tr>
						<tr height="15"></tr>
						<tr>
							<td width="100%" align="center" bgcolor="323232">
								<table width="550" cellspacing="0" cellpadding="0" border="0" style="padding: 2.5%;">
									<tr>
										<td width="100%" align="center">
											<img width="125" height="auto" src="/img/logo.png">
											<br>
										</td>
									</tr>
								</table>
							</td>
						</tr>	
					</table>
				</td>
			</tr>
	</table>
</body>
</html>