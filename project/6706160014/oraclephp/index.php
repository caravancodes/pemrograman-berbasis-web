
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Halaman Pengolahan data kampus </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Le styles -->
		<link href="assets/css/biru.min.css" rel="stylesheet">
		
		<style type="text/css">		body {
				padding-top: 20px;
				padding-bottom: 40px;
			
				
			}
			/* Custom container */
			.container-narrow {
				margin: 0 auto;
				max-width: 800px;
			}
			
			.container-narrow > hr {
				margin: 30px 0;
				
			}
			/* Main marketing message and sign up button */
			.jumbotron {
				margin: 60px 0;
				text-align: center;
			}
			.jumbotron h1 {
				font-size: 72px;
				line-height: 1;
			}
			.jumbotron .btn {
				font-size: 21px;
				padding: 14px 24px;
			}
			/* Supporting marketing content */
			.marketing {
				margin: 60px 0;
			}
			.marketing p + h4 {
				margin-top: 28px;
			}
			label.error{
				color:red;
			}
</style>
	
	</head>
	<body>
	
		<div class="container-narrow">
			<div class="masthead">
				<ul class="nav nav-pills pull-right">
					
					<li>
						<a href="index.php?mod=kampus&pg=kampus_view">Kampus </a>
					</li>
					
				</ul>
				<h2 class="muted">data kampus </h2>
			</div>
			<hr>
			<div class="well">
								<?php
$pg = '';
/*
 * PHP Code untuk mendapatkan halaman view masing masing tabel
 */
include('inc/config.php');
if(!isset($_GET['pg'])) {
 include ('kampus/kampus_form.php');
	}else {
	$pg = $_GET['pg'];
	$mod = $_GET['mod'];
	include $mod . '/' . $pg . ".php";
}?>
			</div>
			
			<hr>
			
			<div class="footer">
				<p style="text-align: center">
					&copy; Candralab Coding Studio 2013
				</p>
			</div>
		</div>
		
	</body>
</html>
