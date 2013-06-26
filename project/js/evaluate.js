
  function evaluate() {
  
    var xmlHttp = null;
    try 
    {
      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (b)
    {
      try 
      {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (c)
      {
        xmlHttp = null;
      }
    }
    if (!xmlHttp && typeof XMLHttpRequest != "undefined")
      {
        xmlHttp = new XMLHttpRequest;
      }
// Function to execute when the readyState of the connection changes.    
    xmlHttp.onreadystatechange=function() {
// A response of 4 indicates the request is complete, we can get the data.  
// Otherwise we just ignore this and return 
      if(xmlHttp.readyState==4) {
	document.getElementById("process").innerHTML=xmlHttp.responseText;
	
      }
	 
    }

/* Open a connection to the server and send a request.
   The connection defaults to the same server/path as this connection with 
   the new file - process.php.  
*/ 
//Information to send to submission form in Javascript
 var request = 'userEmail=' + document.getElementById('userEmail').value + '&password=' + document.getElementById('password').value + '&rePassword=' + document.getElementById('rePassword').value + '&firstName=' + document.getElementById('firstName').value;
  // Open the connection and create the URL as a POST to php file.
   xmlHttp.open("post","http://209.141.52.178/project/project/php/processUser.php", true);
  // Let the server know where it can find the data
  xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
  // Bring the information from the php file to the submission form
  xmlHttp.send(request);
}