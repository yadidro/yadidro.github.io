//var myHeading = document.querySelector('h1');
//myHeading.textContent = 'Hello world!';
//document.querySelector('html').onclick = function() {
   // alert('im not a robot');
//}
var myImage = document.querySelector('img');

myImage.onclick = function() {
    var mySrc = myImage.getAttribute('src');
    if(mySrc === 'images/dolphin.jpg') {
      myImage.setAttribute ('src','images/dolphin2.jpg');
    } else {
      myImage.setAttribute ('src','images/dolphin.jpg');
    }
}
var myButton = document.querySelector('button');
var myHeading = document.querySelector('h1');

function setUserName() {
  var myName = prompt('Please enter your name.');
  localStorage.setItem('name', myName);
  myHeading.innerHTML = 'Mozilla is cool, ' + myName;
}

if(!localStorage.getItem('name')) {
  setUserName();
} else {
  var storedName = localStorage.getItem('name');
  myHeading.innerHTML = 'Mozilla is cool, ' + storedName;
}

myButton.onclick = function() {
  setUserName();
}