var RE_EMAIL = /^(\w)+@([a-z]+\.)+[A-Za-z]+$/;
var phno= /^(\d){10}$/;
var landnumber=/^(\d){6,}$/;
var zipp=/^(\d){6}$/;
var charr=/^[A-z]+$/;

function valid_mail1()
 {
     var m=document.getElementById("c_email").value
     if(m.length!=0)
      {
    if(RE_EMAIL.test(m))
         {
             
         }
      else
          {
              alert("Invalid email id");
              document.getElementById("c_email").value="";
              
          }
      }
 }
 
   function valid_phn()
   {
       var ph;
       ph=document.getElementById("c_mobile").value;
       if(ph.length!=0)
           {
               if(phno.test(ph))
               {
                   
               }
               else
                   {
                       alert("Mobile number is not valid\n10 digit required");
                       document.getElementById("c_mobile").value="";
                   }
           }
   }
   
   function valid_phnland()
   {
       var ph;
       ph=document.getElementById("c_phone").value;
       if(ph.length!=0)
           {
               if(landnumber.test(ph))
               {
                   
               }
               else
                   {
                       alert("Phone number is not valid\nminimum 6 number required ");
                       document.getElementById("c_phone").value="";
                   }
           }
   }
   
   function valid_zip()
   {
       var zip;
       zip=document.getElementById("c_zip").value;
       if(zip.length!=0)
           {
               if(zipp.test(zip))
               {
                   
               }
               else
                   {
                       alert("Zip is not valid\nA zip contain 6 digits ");
                       document.getElementById("c_zip").value="";
                   }
           }
   }
   
      function valid_fname()
   {
       var name;
       name=document.getElementById("c_fname").value;
       if(name.length!=0)
           {
               if(charr.test(name))
               {
                   
               }
               else
                   {
                       alert("Please give only character");
                       document.getElementById("c_fname").value="";
                   }
           }
   }
   
   
    function valid_lname()
   {
       var name;
       name=document.getElementById("c_lname").value;
       if(name.length!=0)
           {
               if(charr.test(name))
               {
                   
               }
               else
                   {
                       alert("Please give only character");
                       document.getElementById("c_lname").value="";
                   }
           }
   }
   
   
    function valid_place()
   {
       var name;
       name=document.getElementById("c_place").value;
       if(name.length!=0)
           {
               if(charr.test(name))
               {
                 
           
               }
               else
                   {
				   alert("Please give only character");		   
                       document.getElementById("c_place").value="";
                   }
           }
   }
   
   
   
       function vali()
       {
           submitOK="true";
           var fname,lname,addrs1,state,country;
           fname=document.getElementById("c_fname").value.trim();
		   lname=document.getElementById("c_lname").value.trim();
		   addrs1=document.getElementById("c_addrs1").value.trim();
		   state=document.getElementById("c_state").value.trim();
		   country=document.getElementById("c_country").value.trim(); 
	   
           if(fname=="" || lname=="" || addrs1=="" || state=="null" || country=="null")
           	{
           	      alert("All necesary data is not given");
                      
                   submitOK="false";
            }
            
            if(submitOK=="false")
         return false;
         else
               return true;
			  

			  
	function no_of_room(){
	
	  alert("workkkk");
	  noroom.setAttribute('readonly', 'readonly');   
	
	}