//
//Author: 
//php part: FONG IEK KIN BC000076
//data: 

//Program description: this page is used to display the product
//

var xmlHttp;
      
function showSuggestion(str)
{
   empty = false
   if (str.length == 0)
   {
      document.getElementById("search_product").innerHTML="";
      empty = true
   }
   else
      xmlHttp = new XMLHttpRequest();
   if (xmlHttp == null)
   {
      alert ("Your browser does not support AJAX");
      return;
   }
   if(empty){
      var url = "getsuggestion_empty.php";
      url = url+"?q="+str;
      xmlHttp.onreadystatechange=stateChanged;
      xmlHttp.open("GET",url,true);
      xmlHttp.send();
   }
   else{
      var url = "getsuggestion.php";
      url = url+"?q="+str;
      xmlHttp.onreadystatechange=stateChanged;
      xmlHttp.open("GET",url,true);
      xmlHttp.send();
   }
}

function stateChanged()
{
   if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
   {
      document.getElementById("search_result").innerHTML = xmlHttp.responseText;
   }
}