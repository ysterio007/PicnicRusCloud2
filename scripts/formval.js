
var nbsp = 160;		// non-breaking space char
var node_text = 3;	// DOM text node-type
var emptyString = /^\s*$/ ;
var global_valfield;	// retain valfield for timer thread

// --------------------------------------------
//                  trim
// Trim leading/trailing whitespace off string
// --------------------------------------------

function trim(str)
{
  return str.replace(/^\s+|\s+$/g, '');
}


// --------------------------------------------
//                  setfocus
// Delayed focus setting to get around IE bug
// --------------------------------------------

function setFocusDelayed()
{
  global_valfield.focus();
}

function setfocus(valfield)
{
  // save valfield in global variable so value retained when routine exits
  global_valfield = valfield;
  setTimeout( 'setFocusDelayed()', 100 );
}




// --------------------------------------------
//            commonCheck
// Common code for all validation routines to:
// (a) check for older / less-equipped browsers
// (b) check if empty fields are required
// Returns true (validation passed), 
//         false (validation failed) or 
//         proceed (don't know yet)
// --------------------------------------------

var proceed = 2;  

function commonCheck    (valfield,   // element to be validated
                         infofield,  // id of element to receive info/error msg
                         required)   // true if required
{
  if (!document.getElementById) 
    return true;  // not available on this browser - leave validation to the server
  var elem = document.getElementById(infofield);
  if (!elem.firstChild) return true;  // not available on this browser 
  if (elem.firstChild.nodeType != node_text) return true;  // infofield is wrong type of node  

  if (emptyString.test(valfield.value)) {
    if (required) {
        document.getElementById(infofield).className="label2";
      setfocus(valfield);
      return false;
    }
    else {
        document.getElementById(infofield).className="label";
      return true;  
    }
  }
  return proceed;
}

// --------------------------------------------
function validateEmail(valfield,   // element to be validated
                         infofield,  // id of element to receive info/error msg
                         required)   // true if required
{

  var stat = commonCheck (valfield, infofield, required);
  if (stat != proceed) return stat;

  var tfld = trim(valfield.value);  // value of field with whitespace trimmed off
  var email = /^[^@]+@[^@.]+\.[^@]*\w\w$/  ;
  if (!email.test(tfld)) {
   document.getElementById(infofield).className="label2";
    setfocus(valfield);
    return false;
  }

  var email2 = /^[A-Za-z][\w.-]+@\w[\w.-]+\.[\w.-]*[A-Za-z][A-Za-z]$/  ;
  if (!email2.test(tfld)) 
      document.getElementById(infofield).className="label2";
  else
      document.getElementById(infofield).className="label";
  return true;
}
// --------------------------------------------

function validateDB(valfield,   // element to be validated
                         infofield,  // id of element to receive info/error msg
                         required,// true if required
						 mt1,
						 yt1
						 )   
{
var date123 = new Date();
var cyear = date123.getYear();
if (cyear < 1900)
{
cyear=cyear+1900
}
//alert(mt1+" "+yt1);
var dm=daysInMonth(mt1,yt1);
//alert(mt1+" "+yt1+" "+dm);
  var stat = commonCheck (valfield, infofield, required);
  if (stat != proceed) return stat;

  var tfld = trim(valfield.value);  // value of field with whitespace trimmed off


  var day2 = /^([1-9]|[12][0-9]|3[01])$/  ;
  if (!day2.test(tfld)||tfld>dm||(cyear-yt1<18)) {
    document.getElementById(infofield).className="label2";
	}
  else{
  document.getElementById(infofield).className="label";

  }
  return true;
}
function daysInMonth(iMonth, iYear)
{
	return new Date(iYear,iMonth,0).getDate();
}
// --------------------------------------------

function validateTeleFax  (valfield,   // element to be validated
                         infofield,  // id of element to receive info/error msg
                         required)   // true if required
{
  var stat = commonCheck (valfield, infofield, required);
  if (stat != proceed) return stat;

  var tfld = trim(valfield.value);  // value of field with whitespace trimmed off
  var telnr = /^\+?[0-9 ()-]+[0-9]$/  ;
  if (!telnr.test(tfld)) {
    document.getElementById(infofield).className="label2";
    setfocus(valfield);
    return false;
  }

  var numdigits = 0;
  for (var j=0; j<tfld.length; j++)
    if (tfld.charAt(j)>='0' && tfld.charAt(j)<='9') numdigits++;

  if (numdigits<6) {
    document.getElementById(infofield).className="label2";
    setfocus(valfield);
    return false;
  }

  if (numdigits>14)
    document.getElementById(infofield).className="label2";
  else { 
    if (numdigits<7)
    document.getElementById(infofield).className="label2";
    else
    document.getElementById(infofield).className="label";
  }
  return true;
}

// --------------------------------------------
function validateAddress(valfield,   // element to be validated
                         infofield,
						 op) // id of element to receive info/error msg
{
  var stat = commonCheck (valfield, infofield, op);
  if (stat != proceed) return stat;

    document.getElementById(infofield).className="label";
  return true;
}

// --------------------------------------------
function validateName(valfield,   // element to be validated
                         infofield,
						 op) // id of element to receive info/error msg
{
  var stat = commonCheck (valfield, infofield, op);
  if (stat != proceed) return stat;

    document.getElementById(infofield).className="label";
  return true;
}

// --------------------------------------------
function validateOnSubmitR2(f){

var errs=0;

    // execute all element validations in reverse order, so focus gets

    // set to the first one in error.

 if (!validateUserNameSC2(document.forms[0].username, 'inf_username2', true)) errs += 1; 

 if (!validatePasswordSC2(f.password,'inf_password',true)) errs += 1; 
    if (!validatePasswordSC2(f.password_again, 'inf_password_again', true)) errs += 1; 


		
    //if (errs>1)  alert('There are fields '+errs+' which need correction before sending');

   // if (errs==1) alert('There is a field which needs correction before sending');



    return (errs==0);

  }
  // --------------------------------------------
function validateOnSubmit2(f){


    var errs=0;

    // execute all element validations in reverse order, so focus gets

    // set to the first one in error.

 if (!validateEmail(document.forms[0].email, 'inf_email', true)) errs += 1; 

 if (!validateDB(f.dt1,'inf_db',true,f.mt1.value, f.yt1.value)) errs += 1; 
    if (!validateName(f.name, 'inf_name', true)) errs += 1; 
    if (!validateAddress(f.address, 'inf_address', true)) errs += 1; 
    if (!validateTeleFax(f.fax, 'inf_fax', true)) errs += 1; 
	    if (!validateTeleFax(f.phone, 'inf_phone', true)) errs += 1; 

		
    //if (errs>1)  alert('There are fields '+errs+' which need correction before sending');

    //if (errs==1) alert('There is a field which needs correction before sending');



    return (errs==0);

  }
  // --------------------------------------------
function validateUserNameSC2(valfield,   // element to be validated
                         infofield,  // id of element to receive info/error msg
                         required)   // true if required
{

  var stat = commonCheck (valfield, infofield, required);
  if (stat != proceed) return stat;

  var tfld = trim(valfield.value);  // value of field with whitespace trimmed off
  var email = /^([a-zA-Z]){2}[a-zA-Z0-9\_]{2,11}([a-zA-Z]{2})$/;
  if (!email.test(tfld)) {
        document.getElementById(infofield).className="label2";
    setfocus(valfield);
    return false;
  }

  var email2 = /^([a-zA-Z]){2}[a-zA-Z0-9\_]{2,11}([a-zA-Z]{2})$/;
  if (!email2.test(tfld)) 
        document.getElementById(infofield).className="label2";
  else
        document.getElementById(infofield).className="label";
  return true;
}
// --------------------------------------------
// --------------------------------------------
function validatePasswordSC2(valfield,   // element to be validated
                         infofield,  // id of element to receive info/error msg
                         required)   // true if required
{

  var stat = commonCheck (valfield, infofield, required);
  if (stat != proceed) return stat;

  var tfld = trim(valfield.value);  // value of field with whitespace trimmed off
  var reg1 = /^([A-Z]){1}[a-zA-Z0-9\.\_]{6,10}([0-9]{1})$/;
  if (!reg1.test(tfld)) {
        document.getElementById(infofield).className="label2";
    setfocus(valfield);
    return false;
  }

  var reg2 =/^([A-Z]){1}[a-zA-Z0-9\.\_]{6,10}([0-9]{1})$/;
  if (!reg2.test(tfld)) 
        document.getElementById(infofield).className="label2";
  else
        document.getElementById(infofield).className="label";
  return true;
}
// --------------------------------------------
  // --------------------------------------------
function validateOnSubmit3(f){


    var errs=0;

    // execute all element validations in reverse order, so focus gets

    // set to the first one in error.

 //if (!validate_t1(document.forms[0].txtCardType, 'inf_t1', true)) errs += 1; 
 if (!validate_t2(document.forms[0].txtNameOnCard, 'inf_t2', true)) errs += 1; 
 if (!validate_t3(document.forms[0].txtCardNumber, 'inf_t3', true)) errs += 1; 
  if (!validate_t4(document.forms[0].txtMonth, 'inf_t4', true)) errs += 1; 
   if (!validate_t5(document.forms[0].txtCVVNumber, 'inf_t5', true)) errs += 1; 

    if (errs>1)  alert('There are fields '+errs+' which need correction before sending');

    if (errs==1) alert('There is a field which needs correction before sending');



    return (errs==0);

  }
  // --------------------------------------------
function  validate_t2(valfield, infofield, required)
{



  var tfld = trim(valfield.value);  // value of field with whitespace trimmed off
  var reg1 = /^(([a-zA-Z\s]){3,10})$/;
  if (!reg1.test(tfld)) {
    msg (infofield, "error", "ERROR: not a valid NameOnCard");
    setfocus(valfield);
    return false;
  }
msg (infofield, "warn", "");
  return true;

}
function  validate_t3(valfield, infofield, required)
{



  var tfld = trim(valfield.value);  // value of field with whitespace trimmed off
  var reg1 = /^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/;
  if (!reg1.test(tfld)) {
    msg (infofield, "error", "ERROR: not a valid Card Number eg : 4408041234567893");
    setfocus(valfield);
    return false;
  }
msg (infofield, "warn", "");
  return true;

}
function  validate_t5(valfield, infofield, required)
{



  var tfld = trim(valfield.value);  // value of field with whitespace trimmed off
  var reg1 = /^(([0-9]){3})$/;
  if (!reg1.test(tfld)) {
    msg (infofield, "error", "ERROR: not a valid CVV Number");
    setfocus(valfield);
    return false;
  }
msg (infofield, "warn", "");
  return true;

}
function  validate_t4(valfield, infofield, required)
{

var d = new Date();
var n = d.getMonth();

  var tfld = trim(valfield.value);  // value of field with whitespace trimmed off
  var reg1 = /^(([0-9]){2})$/;
  if (!reg1.test(tfld)||tfld <n) {
    msg (infofield, "error", "ERROR: not a valid Date");
    setfocus(valfield);
    return false;
  }
msg (infofield, "warn", "");
  return true;

}

// --------------------------------------------

function msg(fld,     // id of element to display message in - whom
             msgtype, // class to give element ("warn" or "error") - where
             message) // string to display - msg
{
  // setting an empty string can give problems if later set to a 
  // non-empty string, so ensure a space present. (For Mozilla and Opera one could 
  // simply use a space, but IE demands something more, like a non-breaking space.)
  var dispmessage;
  if (emptyString.test(message)) 
    dispmessage = String.fromCharCode(nbsp);    
  else  
    dispmessage = message;

  var elem = document.getElementById(fld);
  
  elem.innerHTML= dispmessage;  
  
  elem.className = msgtype;   // set the CSS class to adjust appearance of message
}

// --------------------------------------------