function validatetel() {
  var num = document.getElementById('Telephone').value;
  var patt = /234/;
   var resu =  patt.test(num);
 if (resu === true) {
   var str = "Visit W3Schools";
     var n = num.search(/234/i);
     if (n <= 2) {
       document.getElementById('order-form').action="false.css";
       document.write("hey");

}
}
}
