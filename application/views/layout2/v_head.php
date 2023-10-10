<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="gis teluk bayur">
	<meta name="author" content="gis teluk bayur">
	<meta name="keywords" content="gis teluk bayur">

	<!-- Title Page-->
	<title>Admin : <?= $title ?></title>

	<!-- Fontfaces CSS-->
	<link href="<?= base_url() ?>template/css/font-face.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href="<?= base_url() ?>template/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="<?= base_url() ?>template/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/wow/animate.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/slick/slick.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<!-- <link href="<?= base_url() ?>template/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all"> -->

	<!-- Main CSS-->
	<link href="<?= base_url() ?>template/css/theme.css" rel="stylesheet" media="all">

	<!-- Jquery JS-->
	<script src="<?= base_url() ?>template/vendor/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JS-->
	<script src="<?= base_url() ?>template/vendor/bootstrap-4.1/popper.min.js"></script>
	<script src="<?= base_url() ?>template/vendor/bootstrap-4.1/bootstrap.min.js"></script>
	<!-- Leaflet-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>leaflet-locatecontrol/dist/L.Control.Locate.min.css" />
	<script src="<?= base_url() ?>leaflet-locatecontrol/src/L.Control.Locate.js"></script>


	<!-- <script src="<?= base_url() ?>template/vendor/ckeditor/ckeditor.js"></script> -->


	<script src="<?= base_url() ?>template/vendor/tinymce/js/tinymce/tinymce.min.js"></script>
	<script>
		tinymce.init({
			selector: "textarea",
			plugins: [
				"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"table contextmenu directionality emoticons template textcolor paste fullpage textcolor codesample"
			],

			// toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
			toolbar2: "bullist numlist | outdent indent blockquote | undo redo |  inserttime preview | forecolor backcolor",
			// toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft codesample",

			menubar: true,
			toolbar_items_size: 'small',

			style_formats: [{
					title: 'Bold text',
					inline: 'b'
				},
				{
					title: 'Red text',
					inline: 'span',
					styles: {
						color: '#ff0000'
					}
				},
				{
					title: 'Red header',
					block: 'h1',
					styles: {
						color: '#ff0000'
					}
				},
				{
					title: 'Example 1',
					inline: 'span',
					classes: 'example1'
				},
				{
					title: 'Example 2',
					inline: 'span',
					classes: 'example2'
				},
				{
					title: 'Table styles'
				},
				{
					title: 'Table row 1',
					selector: 'tr',
					classes: 'tablerow1'
				}
			],

			templates: [{
					title: 'Test template 1',
					content: 'Test 1'
				},
				{
					title: 'Test template 2',
					content: 'Test 2'
				}
			]
		});
	</script>

	<script type="text/javascript" src="<?= base_url() ?>template/fb/jquery.js"></script>

	<link rel="stylesheet" href="<?= base_url() ?>template/fb/jquery.fancybox.css?v=2.1.0" type="text/css" media="screen" />
	<script type="text/javascript" src="<?= base_url() ?>template/fb/jquery.fancybox.pack.js?v=2.1.0"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox({

			});

		});
	</script>




</head>