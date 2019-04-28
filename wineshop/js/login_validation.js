function validation()
{
var username=document.getElementById("first_name").value;  
var userpassword1=document.getElementById("pass1").value; 
     
//check name is not empty  
if (username == "")
{
alert("Please enter your username.");
return false;
}

//check name contains only letters, spaces and dashes
else if (!/^[a-zA-Z\s-]+$/.test(username)) 
{
alert("Your name entry seem to contain invalid charachters.");
return false;
}

//check name is at least 3 char long       
else if (username.length < 3) 
{
alert("It is highly doubtful your name contains less then 3 charachters.");
return false;
}

//check password is at lest 8 char long       
else if (userpassword1.length < 8) 
{
alert("Your password consists of at least 8 charachters.");
return false;
}
    
else 
{
alert('Verify your data and click OK to submit.');
return true; 
}
}   
