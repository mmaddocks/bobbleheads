/* Script to create "Custom Made" <canvas> graphic */

var canvas = document.getElementById("custom-canvas");
var context = canvas.getContext("2d");

// Drawing the circle // 
context.beginPath();
context.arc(145, 145, 144, 0, 2*Math.PI);  
context.strokeStyle = "#fff";
context.stroke();

// Text //
context.font = "50px sans-serif";
context.fillStyle = "#fff";
context.textAlign = "center";
context.fillText("Avengers", canvas.width/2, canvas.height/2);



/* (x, y, radius, sAngle, EAngle)
arc(x-coordinate "horizontal", y-coordinate "vertical", radius/size (100 = full size of container), start position (0 starts at the 3 o'clock position)), end position (2 = full circle) */



/* canvas #2 */
var canvas = document.getElementById("custom-canvas2");
var context = canvas.getContext("2d");

// Drawing the circle //
context.beginPath();
context.arc(145, 145, 144, 0, 2*Math.PI);  
context.strokeStyle = "#fff";
context.stroke(); 

// Text //
context.font = "50px sans-serif";
context.fillStyle = "#fff";
context.textAlign = "center";
context.fillText("Star Wars", canvas.width/2, canvas.height/2);
