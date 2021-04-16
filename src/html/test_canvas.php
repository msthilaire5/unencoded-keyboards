<!DOCTYPE html>
<html>

<head>
	<title>Canvas Testing</title>
	<link href='main.css' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body style="background-color: white;">
      <div class="topnav">
        <li><a class='active' href="./index.php">Home</a></li>
        <li><a href="./aboutus.html">About Us</a></li>
        <li><a href="./test_canvas.php">Create a character</a></li>
      </div>
      	<br>
	<h1>DRAWING CANVAS</h1>
	<canvas id="test-canvas" width="600" height="600" style="border: 5px solid; background-color: white; border-color:black">
		<script type="text/javascript">

			let isDrawing = false;
			let strokeThickness = 5;
			window.onload = canvasSetUp;

			function canvasSetUp() {
				var c = document.getElementById("test-canvas");
				var ctx = c.getContext("2d");
				ctx.fillStyle = "black";

				c.addEventListener('mousedown', function () {
					beginDraw(event, ctx);
				});
				c.addEventListener('mouseup', stopDraw);
				c.addEventListener('mousemove', function () {
					createStroke(event, ctx);
				});
			}
			
			function beginDraw(event, context) {
				isDrawing = true;
				createStroke(event, context);
			}

			function stopDraw() {
				isDrawing = false;
			}

			function createStroke(event, context) {
				if (isDrawing) {
					var x = event.offsetX;
					var y = event.offsetY;

					context.beginPath();
					context.arc(x, y, strokeThickness, 0, 2 * Math.PI);
					context.stroke();
					context.fill();
				}			
			}

			function clearCanvas() {
				var c = document.getElementById("test-canvas");
				var ctx = c.getContext("2d");
				ctx.clearRect(0,0, c.width, c.height);
			}

			function saveChar() {
				var c = document.getElementById("test-canvas");
				var charImgData = c.toDataURL("image/png");
				var downloadElem = document.createElement('a');
				downloadElem.href = charImgData;
				downloadElem.download = 'newchar.png';
				downloadElem.click();
			}

			function saveToServer() {
				var canvas = document.getElementById("test-canvas");
				var dataURL = canvas.toDataURL();
				$.ajax({
  					type: "POST",
  					url: "script.php",
  					data: { 
     					imgBase64: dataURL
  					}
				}).done(function(o) {
  					console.log('saved'); 
				});
			}
		</script>
	</canvas>
</div>

<div>
	<button type="button" value="clear" onclick="clearCanvas()">clear</button>
	<button type="button" value="save" onclick="saveChar()">save</button>
	<button type="button" value="saveToServer" onclick="saveToServer()">send to server</button>
	<p id="img-send-msg" style="display: inline;"></p>
</div>

</body>
</html>