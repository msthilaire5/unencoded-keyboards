let isDrawing = false;
let strokeThickness = 5;
window.onload = canvasSetUp;

function canvasSetUp() {
  var c = document.getElementById("draw-canvas");
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
  var c = document.getElementById("draw-canvas");
  var ctx = c.getContext("2d");
  ctx.clearRect(0,0, c.width, c.height);
}

function saveChar() {
  var c = document.getElementById("draw-canvas");
  var charImgData = c.toDataURL("image/png");
  var downloadElem = document.createElement('a');
  downloadElem.href = charImgData;
  downloadElem.download = 'newchar.png';
  downloadElem.click();
}

function saveToServer() {
  var c = document.getElementById("draw-canvas");
  var charImgURL = c.toDataURL("image/png");
  var img_b64 = charImgURL.substring(charImgURL.search(",") + 1);

  $.get("upload/" + img_b64, function () {
    var imgSendMsg = document.getElementById("img-send-msg");
    imgSendMsg.innerHTML = "Sucessfully added new character!";
  });
}