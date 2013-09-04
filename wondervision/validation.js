var RE_EMAIL = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
var balance=/^\d+(\.\d{1,2})?$/;
var two_two=/^\d{0,2}(\.\d{1,2})?$/;
var phno= /^(\d){10}$/;
var n3= /^(\d){1,}$/;
var landnumber=/^(\d){6,}$/;
var zipp=/^(\d){6}$/;
var charr=/^[A-z]+$/;
var croom,cadult,cchild,camount,tamount,t_type,sp,td,p_t_a,p_t_a1;

function cal_ta2(){

var pdtrate=document.getElementById("rate").value;

var totday=document.getElementById("totday").value;

var noofrooms=document.getElementById("noofrooms").value;

if(pdtrate != "")
document.getElementById("rate_f").value=(pdtrate*totday*noofrooms).toFixed(2);
}



function cal_due(){
var adv=document.getElementById("advance").value;
var amount=document.getElementById("gtotal").value;

if(adv.length==0){
  alert("Give the advance");
 }
else
 {
  document.getElementById("due").value=(parseFloat(amount)-parseFloat(adv)).toFixed(2);
 
 }
}

function test_adv(){

var name;
	name=document.getElementById("advance").value;
	if(name.length!=0)
           {
               if(balance.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("advance").value="";
                   }
           }

}

function cal_gt(){
var st=document.getElementById("ser_tax").value;
var sc=document.getElementById("charge").value;
var rate=document.getElementById("rate_f").value;
if(st.length==0 || sc.length==0 || rate.length==0){
alert("All mandotory field is not given");
}
else{
st=((st/100)*rate).toFixed(2);
sc=((sc/100)*rate).toFixed(2);

rate=(parseFloat(rate)+parseFloat(sc)+parseFloat(st)).toFixed(2);
document.getElementById("gtotal").value=rate;
}

}


function test_st(){
 
  
  var name;
	name=document.getElementById("ser_tax").value;
	if(name.length!=0)
           {
               if(two_two.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("ser_tax").value="";
                   }
           }
  
}

function test_sc(){
 
  
  var name;
	name=document.getElementById("charge").value;
	if(name.length!=0)
           {
               if(two_two.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("charge").value="";
                   }
           }
  
}


function valid_rate(){
 
  
  var name;
	name=document.getElementById("rate").value;
	if(name.length!=0)
           {
               if(balance.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("rate").value="";
                   }
           }
  
}

function cal_ta(){

var p_dt_rate=document.getElementById("rate").value;

var tot_day=document.getElementById("tot_day").value;

if(p_dt_rate != "")
document.getElementById("rate_f").value=(p_dt_rate*tot_day).toFixed(2);



}

function h_adult1()
   {
       var ph;
       ph=document.getElementById("child").value;
       if(ph.length!=0)
           {
               if(n3.test(ph))
               {
                   
               }
               else
                   {
                       alert("Only digit possible");
                       document.getElementById("child").value=cchild;
                   }
           }
   }
   
   function f_h_adult1(){
   cchild=document.getElementById("child").value;
   }


function h_adult()
   {
       var ph;
       ph=document.getElementById("adult").value;
       if(ph.length!=0)
           {
               if(n3.test(ph))
               {
                   
               }
               else
                   {
                       alert("Only digit possible");
                       document.getElementById("adult").value=cadult;
                   }
           }
   }
   
   function f_h_adult(){
   cadult=document.getElementById("adult").value;
   }


function h_room()
   {
       var ph;
       ph=document.getElementById("room").value;
       if(ph.length!=0)
           {
               if(n3.test(ph))
               {
                   
               }
               else
                   {
                       alert("Only digit possible");
                       document.getElementById("room").value=croom;
                   }
           }
   }
   
   function f_h_room(){
   croom=document.getElementById("room").value;
   }




function t_adult1()
   {
       var ph;
       ph=document.getElementById("tchild").value;
       if(ph.length!=0)
           {
               if(n3.test(ph))
               {
                   
               }
               else
                   {
                       alert("Only digit possible");
                       document.getElementById("tchild").value=p_t_a1;
                   }
           }
   }
   
   function f_t_adult1(){
   p_t_a1=document.getElementById("tchild").value;
   }



function t_adult()
   {
       var ph;
       ph=document.getElementById("tadult").value;
       if(ph.length!=0)
           {
               if(n3.test(ph))
               {
                   
               }
               else
                   {
                       alert("Only digit possible");
                       document.getElementById("tadult").value=p_t_a;
                   }
           }
   }
   
   function f_t_adult(){
   p_t_a=document.getElementById("tadult").value;
   }



     function t_start_p()
   {
       var name;
       name=document.getElementById("tsp").value;
       if(name.length!=0)
           {
               if(charr.test(name))
               {
                   
               }
               else
                   {
                       alert("Please give only character");
                       document.getElementById("tsp").value=sp;
                   }
           }
   }
   
   function fetch_tsp(){
   sp=document.getElementById("tsp").value;
   }
   
      function t_d()
   {
       var name;
       name=document.getElementById("td").value;
       if(name.length!=0)
           {
               if(charr.test(name))
               {
                   
               }
               else
                   {
                       alert("Please give only character");
                       document.getElementById("td").value=td;
                   }
           }
   }
   
   function fetch_td(){
   td=document.getElementById("td").value;
   }
   
     function i_t_d()
   {
       var name;
       name=document.getElementById("vd").value;
       if(name.length!=0)
           {
               if(charr.test(name))
               {
                   
               }
               else
                   {
                       alert("Please give only character");
                       document.getElementById("vd").value="";
                   }
           }
   }
   
       function i_t_s()
   {
       var name;
       name=document.getElementById("vsp").value;
       if(name.length!=0)
           {
               if(charr.test(name))
               {
                   
               }
               else
                   {
                       alert("Please give only character");
                       document.getElementById("vsp").value="";
                   }
           }
   }


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
	
		function net_amount_chk1(){
	var name;
	name=document.getElementById("net_amount1").value;
	if(name.length!=0)
           {
               if(balance.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("net_amount1").value="";
                   }
           }
	
	
	}
	
			function net_amount_chk2(){
	var name;
	name=document.getElementById("net_amount2").value;
	if(name.length!=0)
           {
               if(balance.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("net_amount2").value="";
                   }
           }
	
	
	}
	
	function hamount_eiddetails(){
	var name;
	name=document.getElementById("amount").value;
	
	
	if(name.length!=0)
           {
               if(balance.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");				   
                   document.getElementById("amount").value=camount;
                   }
           }
	
	
	}
	
	function fetchamount(){
	camount=document.getElementById("amount").value;
	
	}
	
		function tamount_eiddetails(){
	var name;
	name=document.getElementById("tr").value;
	
	
	if(name.length!=0)
           {
               if(balance.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");				   
                   document.getElementById("tr").value=tamount;
                   }
           }
	
	
	}
	
	function t_fetchamount(){
	tamount=document.getElementById("tr").value;
	
	}
	
	
	function discount_chk(){
	
	var name;
	name=document.getElementById("discount").value;
	if(name.length!=0)
           {
               if(two_two.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("discount").value="";
                   }
           }
	
	}
	
		function t_discount_chk(){
	
	var name;
	name=document.getElementById("tdsc").value;
	if(name.length!=0)
           {
               if(two_two.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("tdsc").value="";
                   }
           }
	
	}
	
  function service_tax_chk(){
	
	var name;
	name=document.getElementById("servicetax").value;
	if(name.length!=0)
           {
               if(two_two.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("servicetax").value="";
                   }
           }
	
	}
	
	  function t_service_tax_chk(){
	
	var name;
	name=document.getElementById("ttax").value;
	if(name.length!=0)
           {
               if(two_two.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("ttax").value="";
                   }
           }
	
	}
	
  function t_commission_chk(){
  
  var name;
	name=document.getElementById("tc").value;
	if(name.length!=0)
           {
               if(two_two.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("tc").value="";
                   }
           }
  }
  
    function commission_chk(){
  
  var name;
	name=document.getElementById("commission").value;
	if(name.length!=0)
           {
               if(two_two.test(name))
               {

               }
               else
                   {
				   alert("Please give proper value\n Example xx.yy");		   
                   document.getElementById("commission").value="";
                   }
           }
  }
  
  function type_test(){
  var type=document.getElementById("ttype").value;
  if(type=="AC" || type=="NON-AC")
   {
   }
  else
   {
   alert("VAlue allow AC or NON-AC");
   document.getElementById("ttype").value=t_type;
   }
  }
  
  function fetch_type(){
  t_type=document.getElementById("ttype").value;
  document.getElementById("ttype").value="";
  
  
  }
  
 function valid()
       {
           submitOK="true";
		   var note,zip,mob,fn,adr;
   
		   note=document.getElementById("any_notes").value.trim();
		   zip=document.getElementById("c_zip").value.trim();
		   mob=document.getElementById("c_mobile").value.trim();
		   fn=document.getElementById("c_fname").value.trim();
		   adr=document.getElementById("c_addrs1").value.trim();
	
		   if(note=="" || note=="null" || zip=="" || zip=="null" || mob=="" || fn=="" || adr=="")
           	{
           	   
				  alert("Plese fill up the mandatory field");
                      
                      
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
	
	 function date_format(){
	 
	 adate=document.getElementById("datepicker").value.trim();
		   ddate=document.getElementById("datepicker1").value.trim();
		   if(adate!="")
          {
              var cadate=adate.substring(6)+"-"+adate.substring(0,2)+"-"+adate.substring(3,5);
             document.getElementById("datepicker").value=cadate;
              
          }
			
		   if(ddate !="" || ddate!="null")
		    {
			  var cddate=ddate.substring(6)+"-"+ddate.substring(0,2)+"-"+ddate.substring(3,5);
             document.getElementById("datepicker1").value=cddate;
			}
		   
	 
	 }
	 
	 function vali_hotel(){
	 
	    submitOK="true";
           var fname,lname,addrs1,state,country;
           fname=document.getElementById("h_name").value.trim();
		   lname=document.getElementById("net_amount").value.trim();
		   
		   
	   
           if(fname=="null" || lname=="")
           	{
           	      alert("All necesary data is not given");
                      
                   submitOK="false";
            }
            
            if(submitOK=="false")
         return false;
         else
               return true;
	 
	 }
	 
	  function date_format1(){
	 
	 adate=document.getElementById("datepicker3").value.trim();
		   ddate=document.getElementById("datepicker4").value.trim();
		   if(adate!="")
          {
              var cadate=adate.substring(6)+"-"+adate.substring(0,2)+"-"+adate.substring(3,5);
             document.getElementById("datepicker3").value=cadate;
              
          }
			
		   if(ddate !="" || ddate!="null")
		    {
			  var cddate=ddate.substring(6)+"-"+ddate.substring(0,2)+"-"+ddate.substring(3,5);
             document.getElementById("datepicker4").value=cddate;
			}
		   
	 
	 }
	 
	  function vali_resort(){
	 
	    submitOK="true";
           var fname,lname,addrs1,state,country;
           fname=document.getElementById("r_name").value.trim();
		   lname=document.getElementById("net_amount1").value.trim();
		   
	   
           if(fname=="null" || lname=="")
           	{
           	      alert("All necesary data is not given");      
                  submitOK="false";
				
            }
            
            if(submitOK=="false")
         return false;
         else
               return true;
	 
	 }
	 
	 	  function date_format2(){
	 
	 var adate=document.getElementById("datepicker5").value.trim();
		  
		   if(adate!="")
          {
              var cadate=adate.substring(6)+"-"+adate.substring(0,2)+"-"+adate.substring(3,5);
             document.getElementById("datepicker5").value=cadate;
              
          }
	 
	 }
	 
	 function vali_travel(){
	 
	    submitOK="true";
           var fname,lname,addrs1,state,country;
           fname=document.getElementById("vsp").value.trim();
		   lname=document.getElementById("vd").value.trim();
		   addrs1=document.getElementById("net_amount2").value.trim();
           if(fname=="null" || lname=="" || addrs1=="" )
           	{
           	      alert("All necesary data is not given");      
                  submitOK="false";
				
            }
            
            if(submitOK=="false")
         return false;
         else
               return true;
	 
	 }
	 
	 function fake_submit(){
	  alert("Enquiry Saveed Successfully to the database");
	 }
	 
	 
	 
	 
	 
	