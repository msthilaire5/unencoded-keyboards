<!DOCTYPE html>
<html>
  <head>
    <link href='main.css' rel='stylesheet'>
	  <script src='js/app.js' type="text/javascript"></script>
     <script>
        function load() {
            i = 0;
            var array = new Array();

            while (array.length < 10) {
                var temp = i++;
                // if (!contains(array, temp)) {
                     array.push(temp);
                // }
            }
            for (i = 0; i < 10; i++) {
                var btn = document.getElementById("btn" + i);
                btn.value = array[i];
            }

            
        } 

        x= -40;
        y= 0;
        
        function input(e) {
            var canvas = document.getElementById('viewport');
            var context = canvas.getContext('2d');
            var img = new Image();
            img.src = e.src;
            
            
            if (x > (canvas.width - 80)){
                y = y + 40;
                x = 0;
            } 
             else if (x<0){
                 x=0
             }
             else if (y<0){
                 y=0
             }
             else if ( y > canvas.height -80 ){
                 longer(canvas, context); 
             }
            else {
                x = x + 40;
            }

            context.drawImage(img, x=x, y=y, width=55, height=55);
            
            
        }
        
        function space() {
            var canvas = document.getElementById('viewport');
            
            if (x > (canvas.width - 80)){
                y = y + 40;
                x = 0;
            }  
             else if ( y > canvas.height -80 ){
                 longer(canvas, context); 
             }
            else {
                x = x + 40;
            }
        }

        //dosen't work without webserver
        function longer(canvas, context) {
            var oldCanvas = canvas.toDataURL("image/png");
            var img = new Image();
            img.src = oldCanvas;
            img.onload = function (){
                canvas.height += 100;
                context.drawImage(img, 0, 0);
            }       
        }

        function del() {
            var canvas = document.getElementById('viewport');
            var context = canvas.getContext('2d');
            
            context.beginPath();
            context.rect(x=x, y=y, 40, 40);
            context.fillStyle = "white"
            context.fill();

            if(y == 0 && x <= 0){
                y=0
                x=-40
            }
            else if (x <= 0){
                y = y - 40;
                x = Math.trunc((canvas.width / 40)) * 40 - 40;
                console.log(x)
            }  
             else if ( y > canvas.height -80 ){
                longer(canvas, context); 
             }
            else {
                x = x - 40;
            }
            
            

            

            
        }

        //dosen't work without webserverS
        function downloadCanvas(){  
            var canvas = document.getElementById('viewport');
            // get canvas data  
            var image = canvas.toDataURL();  

            // create temporary link  
            var tmpLink = document.createElement( 'a' );  
            tmpLink.download = 'image.png'; // set the name of the download file 
            tmpLink.href = image;  

            // temporarily add link to body and initiate the download  
            document.body.appendChild( tmpLink );  
            tmpLink.click();  
            document.body.removeChild( tmpLink );  
            }
        

   
    </script>
    <link href="https://fonts.googleapis.com/css?family=Karla|Source+Code+Pro|Nunito+Sans&display=swap" rel="stylesheet">
  </head>
  <body>
    <h1><a href="./index.php" style="color: black; text-decoration: none;">Script Key</a></h1>

	<center>
      <div class="topnav">
        <li><a class='active' href="./index.php">Home</a></li>
        <li><a href="./aboutus.html">About Us</a></li>
        <li><a href="./test_canvas.php">Create a character</a></li>
      <div>
	</center>
	<br>
    <br>
	<h2>Welcome to your custom keyboard: </h2>
	<body onload="load();">

    <canvas id="viewport" style="border:1px solid #000000;"> </canvas>

    <div id="VirtualKey">
        <?php include 'imagegallery.php';?>
        <input id="btnDel" type="button" value="Space" onclick="space();" />
        <input id="btnDwld" type="button" value="Save" onclick="downloadCanvas();" />
        <input id="btnDwld" type="button" value="Backspace" onclick="del();" />
    </div>
  </body>
</html>
