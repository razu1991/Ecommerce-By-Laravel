//Create a boolean variable to check for a valid Internet Explorer instance.
var xmlhttp = false;
//Check if we are using IE.
try {
    //If the Javascript version is greater than 5.
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    //alert ("You are using Microsoft Internet Explorer.");
} catch (e) {

    //If not, then use the older active x object.
    try {
        //If we are using Internet Explorer.
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        //alert ("You are using Microsoft Internet Explorer");
    } catch (E) {
        //Else we must be using a non-IE browser.
        xmlhttp = false;
    }
}
//If we are using a non-IE browser, create a javascript instance of the object.
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
    xmlhttp = new XMLHttpRequest();
    //alert ("You are not using Microsoft Internet Explorer");
}
function makerequest(given_text,objID)
 { 
	//alert(given_text);
        //var obj = document.getElementById(objID);
        serverPage='ajax-email-check/'+given_text;
	xmlhttp.open("GET", serverPage);
	xmlhttp.onreadystatechange = function()
	 {
	//alert(xmlhttp.readyState);
	//alert(xmlhttp.status);
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		 {
			//alert(xmlhttp.responseText);
                                                    document.getElementById(objID).innerHTML = xmlhttp.responseText;
			//document.getElementById(objcw).innerHTML = xmlhttp.responseText;
                                                     if(xmlhttp.responseText == 'Alredy Exists !')
                                                     {
                                                         document.getElementById('place_order').disabled=true;
                                                     }
                                                     if(xmlhttp.responseText == 'Avilable')
                                                     {
                                                         document.getElementById('place_order').disabled=false;
                                                     }
                        
		 }
	}

    xmlhttp.send(null);
}
function FillShipping(f) {
  if(f.shippingtoo.checked !== false) {
    f.shipping_first_name.value = f.billing_first_name.value;
    f.shipping_last_name.value = f.billing_last_name.value;
    f.shipping_address.value=f.billing_address.value;
    f.shipping_city.value=f.billing_city.value;
    f.shipping_company.value=f.billing_company.value;
    f.shipping_country.value=f.billing_country.value;
    f.shipping_state.value=f.billing_state.value;
    f.shipping_postcode.value=f.billing_postcode.value;
  }
}
function search_product(given_text, objID)
{

    if(!given_text)
    {
         location.reload();
    }
    //alert(given_text);
    //  var obj = document.getElementById(objID);
    if (given_text)
    {
        serverPage = 'http://localhost/ecommerce/public/search/' + given_text;
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function ()
        {
            //alert(xmlhttp.readyState);
            //alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                //alert(xmlhttp.responseText);
                //result = xmlhttp.responseText;           
                document.getElementById(objID).innerHTML = xmlhttp.responseText;
                //document.getElementById(objcw).innerHTML = xmlhttp.responseText;
                if(result == null)
                {
                   
                }


            }

        }

    }

    xmlhttp.send(null);
}