/*
function Get_History() {
chrome.history.search({text:'',maxResults:2}, function(data) {
   data.forEach(function(page) {
        document.write(page.id+
        	"\n"+page.title+
        	"\n"+page.url+
        	"\n"+page.lastVisitTime+
        	"\n"+page.visitCount+
        	"\n"+page.typeCount);
    });
});
}
document.getElementById('Trails').onclick = Get_History;
*/

function Get_History() {
chrome.history.search({text:'',maxResults:3}, function(data) {
   var json_flow=JSON.stringify(data);
   //document.write(json_history);
      d = document;
      var f = d.createElement('form');
      f.action = 'http://localhost/Trails_Server/test.php';
      f.method = 'post';
      var i = d.createElement('input');
      i.type = 'hidden';
      i.name = 'flow';
      i.value = json_flow;
      f.appendChild(i);
      d.body.appendChild(f);
      f.submit();
      chrome.history.getVisits({url:'http://www.w3schools.com/jsref/jsref_forEach.asp'},function(visits){
      var visits1=JSON.stringify(visits);
      var j=d.createElement('input');
      j.type='hidden';
      j.name='visits';
      j.value=visits1;
      f.appendChild(j);
      d.body.appendChild(f);
      f.submit();
      });
   /*
   request= new XMLHttpRequest();
   request.open("POST", "http://localhost/test.php", true);
   request.setRequestHeader("Content-type", "application/json");
   request.send(json_history);
   */
});
}
document.getElementById('Trails').onclick = Get_History;
