function myvalidation()
{
    var firstflag=firstval();
    var genderflag=genderval();
    var emailflag=emailval();
	 var wemailflag=wemailval();
    var pincodeflag=pincodefun();
   	var provinceflag=provinceval();
    var cityflag=cityval();
	var payflag=payval();
    if(firstflag==2 && genderflag==2 && emailflag==2 && pincodeflag==2 && provinceflag==2 && cityflag==2 && payflag==1 && emailflag==2 )
    {
        return true;
    }
    else
    {
        return false;
    } 
	/*&& lastflag==2 && emailflag==2 && pincodeflag==2 && occupationflag==2 && provinceflag==2 && streetflag==2 && cityflag==2 && contactflag==2 && passwordflag==1)*/
}

function firstval()
{
    var firstname=document.getElementById("first-name").value;
    if(firstname.length>0)
    {
        if((/^[a-zA-Z]+$/.test(firstname)))
        {
            document.getElementById("first-name").style.border='';
            document.getElementById("firsterror").style.display="none";
            return 2;
        }
        else
        {
            document.getElementById("first-name").style.borderColor='red';
            document.getElementById("firsterror").style.display="block";
            document.getElementById("firsterror").innerHTML="*Name Should have letter";
           return 1;
        }
    }
    else
    {
        document.getElementById("first-name").style.borderColor='red';
        document.getElementById("firsterror").style.display="block";
        document.getElementById("firsterror").innerHTML="*Name Should be Entered";
        return 0;
    }

}
function genderval()
{
    var firstname=document.getElementById("gender").value;
    if(firstname.length>0)
    {
        if((/^[a-zA-Z]+$/.test(firstname)) && (firstname=="Male" || firstname=="Female" || firstname=="male" || firstname=="female"))
        {
            document.getElementById("gender").style.border='';
            document.getElementById("gendererror").style.display="none";
            return 2;
        }
        else
        {
            document.getElementById("gender").style.borderColor='red';
            document.getElementById("gendererror").style.display="block";
            document.getElementById("gendererror").innerHTML="*Gender Should have Male or Female";
           return 1;
        }
    }
    else
    {
        document.getElementById("gender").style.borderColor='red';
        document.getElementById("gendererror").style.display="block";
        document.getElementById("gendererror").innerHTML="*Gender Should be Entered";
        return 0;
    }

}

function emailval()
{
    var email=document.getElementById("email").value;
    if(email.length>0)
    {
        if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
        {
            document.getElementById("email").style.borderColor="";
            document.getElementById("emailerror").style.display="none";
            return 2;
        }
        else
        {
            document.getElementById("email").style.borderColor="Red";
            document.getElementById("emailerror").style.display="block";
            document.getElementById("emailerror").innerHTML="*Email id is not valid";
            return 1;
        }
    }
    else
    {
        document.getElementById("email").style.borderColor="Red";
        document.getElementById("emailerror").style.display="Block";
        document.getElementById("emailerror").innerHTML="*Email should be entered";
        return 0;
    }

}
function wemailval()
{
    var email=document.getElementById("wemail").value;
    if(email.length>0)
    {
        if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
        {
            document.getElementById("wemail").style.borderColor="";
            document.getElementById("wemailerror").style.display="none";
            return 2;
        }
        else
        {
            document.getElementById("wemail").style.borderColor="Red";
            document.getElementById("wemailerror").style.display="block";
            document.getElementById("wemailerror").innerHTML="*Link id is not valid";
            return 1;
        }
    }
    else
    {
        document.getElementById("wemail").style.borderColor="Red";
        document.getElementById("wemailerror").style.display="Block";
        document.getElementById("wemailerror").innerHTML="*Link should be entered";
        return 0;
    }

}

function pincodefun()
{
    var pincode1=document.getElementById("pincode").value;
    if(pincode1.length == 6)
    {
        if(/^[a-zA-z][0-9][a-zA-z][0-9][a-zA-z][0-9]$/.test(pincode1))
        {
            document.getElementById("pincodeerror2").innerHTML="";
            document.getElementById("pincodeerror2").style.display="none";
            document.getElementById("pincode").style.border='';
            return 2;
        }
        else
        {
            document.getElementById("pincode").style.borderColor="Red";
            document.getElementById("pincodeerror2").style.display="Block";
            document.getElementById("pincodeerror2").innerHTML="*Pincode not valid (eg.L6P3S8)";
            return 1;
        }
        
    }
    else
    {
        document.getElementById("pincode").style.borderColor="Red";
        document.getElementById("pincodeerror2").style.display="Block";
        document.getElementById("pincodeerror2").innerHTML="*Enter Pincode";
        return 0;
    }
    
}

function birthdayval()
{
    document.getElementById('dob').setAttribute('max', getTodaysDate());
}
function provinceval()
{
    var province=document.getElementById("province").value;
    if(province.length>0)
    {
        if(/^[a-zA-Z]+$/.test(province))
        {
            document.getElementById("province").style.borderColor="";
            document.getElementById("provinceerror").style.display="none";
            document.getElementById("provinceerror").innerHTML="";
            return 2;
        }
        else
        {
            document.getElementById("province").style.borderColor="Red";
            document.getElementById("provinceerror").style.display="Block";
            document.getElementById("provinceerror").innerHTML="*province should be letter only";
            return 1;
        }
    }
    else
    {
        document.getElementById("province").style.borderColor="Red";
        document.getElementById("provinceerror").style.display="Block";
        document.getElementById("provinceerror").innerHTML="*province should be entered";
        return 0;
    }


}
function cityval()
{
    var city=document.getElementById("city").value;
    if(city.length>0)
    {
        if(/^[a-zA-Z]+$/.test(city))
        {
            document.getElementById("city").style.borderColor="";
            document.getElementById("cityerror").style.display="none";
            document.getElementById("cityerror").innerHTML="";
            return 2;
        }
        else
        {
            document.getElementById("city").style.borderColor="Red";
            document.getElementById("cityerror").style.display="Block";
            document.getElementById("cityerror").innerHTML="*city should be letter only";
            return 1;
        }
    }
    else
    {
        document.getElementById("city").style.borderColor="Red";
        document.getElementById("cityerror").style.display="Block";
        document.getElementById("cityerror").innerHTML="*city should be entered";
        return 0;
    }
}

function payval()
{	
	var p=document.getElementById("pay").value;
    if(p.length>0)
    {
        if(/^[0-9]+$/.test(p))
        {
            document.getElementById("pay").style.borderColor="";
            document.getElementById("payerror").style.display="none";
            document.getElementById("payerror").innerHTML="";
            return 1;
        }
        else
        {
            document.getElementById("pay").style.borderColor="Red";
            document.getElementById("payerror").style.display="Block";
            document.getElementById("payerror").innerHTML="*Pay should be Digit only";
            return 0;
        }
    }
    else
    {
        document.getElementById("pay").style.borderColor="Red";
        document.getElementById("payerror").style.display="Block";
        document.getElementById("payerror").innerHTML="Pay should be entered";
        return 0;
    }
	
}
