var RE_EMAIL = /^(\w)+@([a-z]+\.)+[A-Za-z]+$/;
var balance=/^\d*\.?((25)|(50)|(5)|(75)|(0)|(00))?$/;
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
       }
	   
	   //firstguestenquiry functions
	   
	   function no_of_room(){
	   var k=document.getElementById("adult_count").value;
	   var g=Math.ceil(k/2);
	   document.getElementById("noroom").value=g;
	   noroom.setAttribute('readonly', 'readonly');   
	   var date1=new Date(document.getElementById("datepicker").value);
	   var date2=new Date(document.getElementById("datepicker1").value);
	
	      var diffDays = (date2- date1)/86400000;
		  //var diffDays=$date2->diff($date1);
		  if(diffDays<0 || isNaN(diffDays)){
		   alert("Wrong Date Selection");
		  // alert(diffDays);
		   document.getElementById("datepicker").value="";
		   document.getElementById("datepicker1").value="";
		   
		   
		   }
		  else
	      document.getElementById("totdate").value=diffDays;
		  
	  }
	  
	  
	  	   function no_of_days(){
	   
	   
	     
	   var date1=new Date(document.getElementById("datepicker").value);
	   var date2=new Date(document.getElementById("datepicker1").value);
	
	      var diffDays = (date2- date1)/86400000;
		  //var diffDays=$date2->diff($date1);
		  if(diffDays<0 || isNaN(diffDays)){
		   alert("Wrong Date Selection");
		  // alert(diffDays);
		   document.getElementById("datepicker").value="";
		   document.getElementById("datepicker1").value="";
		   
		   
		   }
		  else
	      document.getElementById("totdate").value=diffDays;
		  totdate.setAttribute('readonly', 'readonly'); 
		  
	  }
	
	function from_city_chk(){
	var name;
	name=document.getElementById("from_city").value;
	if(name.length!=0)
           {
               if(charr.test(name))
               {

               }
               else
                   {
				   alert("Please give only character");		   
                   document.getElementById("from_city").value="";
                   }
           }
	}
	
	function to_city_chk(){
	var name;
	name=document.getElementById("to_city").value;
	if(name.length!=0)
           {
               if(charr.test(name))
               {

               }
               else
                   {
				   alert("Please give only character");		   
                   document.getElementById("to_city").value="";
                   }
           }
	}
	
	function net_amount_chk(){
	var name;
	name=document.getElementById("net_amount").value;
	if(name.length!=0)
           {
               if(balance.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("net_amount").value="";
                   }
           }
	
	
	}
	
	function discount_chk(){
	
	var name;
	name=document.getElementById("discount").value;
	if(name.length!=0)
           {
               if(balance.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("discount").value="";
                   }
           }
	
	}
	
  function service_tax_chk(){
	
	var name;
	name=document.getElementById("s_tax").value;
	if(name.length!=0)
           {
               if(balance.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("s_tax").value="";
                   }
           }
	
	}
	
  function vat_chk(){
  
  var name;
	name=document.getElementById("vat").value;
	if(name.length!=0)
           {
               if(balance.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("vat").value="";
                   }
           }
  }
  
 function valid()
       {
           submitOK="true";
		   var note;
           /*var fcity,tcity,adate,ddate,norum,totday;
           fcity=document.getElementById("from_city").value.trim();
		   tcity=document.getElementById("to_city").value.trim();*/
		   /*adate=document.getElementById("datepicker").value.trim();
		   ddate=document.getElementById("datepicker1").value.trim();*/
		  /* norum=document.getElementById("noroom").value.trim();
		   totday=document.getElementById("totdate").value.trim();*/
		   note=document.getElementById("any_notes").value.trim();
		   
		   
			/* if(adate!="")
          {
              var cadate=adate.substring(6)+"-"+adate.substring(0,2)+"-"+adate.substring(3,5);
             document.getElementById("datepicker").value=cadate;
              
          }
			
		   if(ddate !="" || ddate!="null")
		    {
			  var cddate=ddate.substring(6)+"-"+ddate.substring(0,2)+"-"+ddate.substring(3,5);
             document.getElementById("datepicker1").value=cddate;
			}*/
	   
	   
           //if(fcity=="" || tcity=="" || adate=="" || ddate=="" || norum=="" || totday=="")*/
		   if(note=="" || note=="null")
           	{
           	      //alert("All necesary data is not given");
				  alert("Plese fill up the note field");
                      
                      
                   submitOK="false";
            }
            
            if(submitOK=="false")
         return false;
         else
               return true;
       }
	   
	   
	   function myfunc()
	{
		document.getElementById('name').innerHTML="Abhirup ghosh";
		document.getElementById('email').innerHTML="abhirupghosh1983@gmail.com";
		document.getElementById('mobile').innerHTML="9434538735";
		document.getElementById('addr1').innerHTML="Moulali";
		document.getElementById('addr2').innerHTML="Sealdah";
		document.getElementById('city').innerHTML="Kolkata";
		document.getElementById('pin').innerHTML="700008";
	
	}
	
	
	




			  

			  
	