function myvalidation()
{
    var usernameflag=valusername();
    var passwordflag=valpassword();
    if(usernameflag==2 && passwordflag==2)
    {
        return true;
    }
    else
    {
        return false;
    } 
}

function valusername()
{
    var username=document.getElementById("username").value;
    if(username.length>0 && username.length<6 && username=="admin")
    {
      
        return 2;
        
    }
    else
    {
        document.getElementById("username").style.borderColor='red';
        
        
        alert("UserName is Invalid");
         return 0;
    }
}
function valpassword()
{
    var password=document.getElementById("password1").value;
    if(password.length>0 && password.length<10 && password=="admin@123")
    {
        
           return 2;
    }
    else
    {
        document.getElementById("password1").style.borderColor='red';
        alert("Password is Invalid");
           return 0;
    }
}