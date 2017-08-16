<?php
if (isset($_POST['code'])) {
	if (file_exists('MyLogPHP.class.php')) include 'MyLogPHP.class.php'; // https://github.com/llagerlof/MyLogPHP
	$code = trim($_POST['code']);
	if (class_exists('MyLogPHP')) MyLogPHP::out($_POST['code'], '$_POST["code"]');
	$has_start_php_tag = strtolower(substr($code, 0, 5)) == '<?php';
	$has_end_php_tag = substr($code, -2) == '?>';
	if ($has_start_php_tag) {
		$code = substr($code, 5);
	}
	if ($has_end_php_tag) {
		$code = substr($code, 0, strlen($code)-2);
	}
	ob_start();
	eval($code);
	$result = ob_get_clean();
	die($result);
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>MyConsolePHP</title>
	<meta name="description" content="MyConsolePHP">
	<meta name="author" content="Lawrence Lagerlof">
	<style>
		#container{
			display: flex;
			width: 100%;
			background-color: #DDDDDD;
			height: 97vh;
			overflow-x: hidden;
		}
		#code{
			width: 50%;
			height: 90vh;
			background-color: white;
		}
		#output{
			flex-grow: 1;
			height: 90vh;
			background-color: #333333;
		}
		#console {
			width:100%;
			height: 90vh;
			background-color: #333333;
			color: white;
			border: none;
		}

	</style>
</head>
<body>
	<div id="container">
		<div id="code"></div>
		<div id="output">
			<textarea id="console"></textarea>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.8/ace.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.8/mode-php.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var editor = ace.edit("code");
		//editor.setTheme("ace/theme/monokai");
		editor.getSession().setMode({path:"ace/mode/php", inline:true});
		editor.focus();
		$(document).ready(function() {
			$('body').keydown(function (e) {
				if (e.ctrlKey && e.keyCode == 13) {
					var code = editor.getValue();
					$.ajax({
						type: 'POST',
						url: 'index.php',
						data: {code: code},
						dataType: 'text',
						cache: false,
						success: function (result) {
							$('#console').val(result);
						},
						error: function (error) {
							console.log (error.responseText);
							alert(error.responseText);
						}
					});
				}
			});
		});
	</script>
</body>
</html>