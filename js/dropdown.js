/**
 * Created by GolamMorshed on 2015-05-02.
 */
function search(string){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }else{
        xmlhttp = new ActiveXObject("XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("search").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "search.php?s="+string, true);
    xmlhttp.send(null);
}