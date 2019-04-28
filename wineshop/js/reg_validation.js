function validation()
 //    var username=document.getElementById("first_name").value;  if (username == "")
   
{
var userAGE=document.getElementById("ageOfUser").value;  

var username=document.getElementById("first_name").value;  
var emailAddress1=document.getElementById("emailADD1").value; 
var emailAddress2=document.getElementById("emailADD2").value; 
var userpassword1=document.getElementById("pass1").value; 
var userpassword2=document.getElementById("pass2").value; 
    //AGE VERIFICATION
if (userAGE == ""){
alert("Please enter your Age.");
return false;}

else if (userAGE < 18){
alert("Only over-18s can register here. Stick to the milk!");
return false;}  
    
else if (userAGE > 130){
alert("Unfortunately we don't deliver to the Great Beyond yet.");
return false;}     
  //check name is not empty  
else if (username == "")
{
alert("Please enter your name.");
return false;
}
 
    //check name contains only letters, spaces and dashes
else if (!/^[a-zA-Z\s-]+$/.test(username)) 
{
alert("Your name entry seem to contain invalid charachters.");
return false;
}
        
else if (username.length < 3) 
{
alert("It is highly doubtful your name contains less then 3 charachters.");
return false;
}

else if (emailAddress1 == "")      
{
alert("Please enter your email address.");
return false;
}     

else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailAddress1))     
{
alert("Please type a valid email address.");
return false;
}
else if (emailAddress1 != emailAddress2) 
{ 
alert("Email entries must match.");
return false;
}
   
else if (userpassword1.length < 8) 
{
alert("You must select a password of at least 8 charachters.");
return false;
}

else if (userpassword1 != userpassword2) 
{ 
alert("Password entries must match.");
return false;
}
    
else 
{
alert('Verify your data and click OK to submit.');
return true; 
}
}   