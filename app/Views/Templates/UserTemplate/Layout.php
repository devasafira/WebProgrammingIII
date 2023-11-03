<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="css/Global.css">
</head>
<body class="overflow-x-hidden">
    <?php include 'Navbar.php' ?>

    <?= $this->renderSection('content') ; ?>

    <?php include 'Footer.php' ?>
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    
    <script>
		AOS.init({
			easing: 'ease-out-back',
			duration: 1000
		});
	</script>
	<script>
		hljs.initHighlightingOnLoad();
		$('.hero__scroll').on('click', function(e) {
			$('html, body').animate({
				scrollTop: $(window).height()
			}, 1200);
		});
	</script>
</body>
</html>