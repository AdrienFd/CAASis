//Slider for the proce in the shop
var slider = document.getElementById("myRange");
var output = document.getElementById("max_price");


//Update the value of the max price (slider)
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
