//var myHeading = document.querySelector('h1');
//myHeading.textContent = 'Hello world!';
//document.querySelector('html').onclick = function() {
   // alert('im not a robot');
//}
var myImage = document.querySelector('img');

//myImage.onclick = function() {
  //  var mySrc = myImage.getAttribute('src');
  //  if(mySrc === 'images/printer.jpg') {
   //   myImage.setAttribute ('src','images/dolphin2.jpg');
  //  } else {
  //    myImage.setAttribute ('src','images/dolphin.jpg');
  //  }
//}
var myButton = document.querySelector('button');
//var switch = document.querySelector('p');
var myHeading = document.querySelector('h3');

/*function setUserName() {
  var myName = prompt('Please enter your name.');
  localStorage.setItem('name', myName);
  myHeading.innerHTML = 'welcome, ' + myName;
}

if(!localStorage.getItem('name')) {
  setUserName();
} else {
  var storedName = localStorage.getItem('name');
  myHeading.innerHTML = 'welcome, ' + storedName;
}

myButton.onclick = function() {
  setUserName();
}
*/






//upload file
const express = require('express');
var app = express();
var upload = require('express-fileupload');
const http = require('http');
http.Server(app).listen(80); // make server listen on port 80

app.use(upload()); // configure middleware

console.log("Server Started at port 80");

app.get('/',function(req,res){
  res.sendFile(__dirname+'/index.html');
})
app.post('/upload',function(req,res){
  console.log(req.files);
  if(req.files.upfile){
    var file = req.files.upfile,
      name = file.name,
      type = file.mimetype;
    var uploadpath = __dirname + '/uploads/' + name;
    file.mv(uploadpath,function(err){
      if(err){
        console.log("File Upload Failed",name,err);
        res.send("Error Occured!")
      }
      else {
        console.log("File Uploaded",name);
        res.send('Done! Uploading files')
      }
    });
  }
  else {
    res.send("No File selected !");
    res.end();
  };
})
