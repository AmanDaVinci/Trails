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
   var jsonon_flow=JSON.stringify(data);
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
      
      chrome.history.getVisits({url: data[0]['url']}, function transition(url){
        var transition_flow=JSON.stringify(url);
        
        var i1 = d.createElement('input');
        i1.type = 'hidden';
        i1.name = 'transition';
        i1.value = transition_flow;
        f.appendChild(i1);
        
        d.body.appendChild(f);
        f.submit();
      } );
   /*
   request= new XMLHttpRequest();
   request.open("POST", "http://localhost/test.php", true);
   request.setRequestHeader("Content-type", "application/json");
   request.send(json_history);
   */
});
}
document.getElementById('Trails').onclick = Get_History;
