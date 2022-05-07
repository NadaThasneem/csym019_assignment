function readTextFile(){
    $.ajax({ 
      url:'recipe.json',
      data:"",
      type:"GET",
      success:function(data){
        // var data = JSON.parse(text);
        console.log(data);
        str="";
        for(i = 0; i<data.length; i++){
            var image = data[i].image;
            var name = data[i].name;
    
            var ingredientsData = data[i].ingredients;
    
            var ingredients="";
    
            for(j=0;j<ingredientsData.length;j++){
                ingredients = ingredients + "<br>" + ingredientsData[j];
            }
    
            var methodData = data[i].method;
            var methods="";
    
            for(j=0;j<methodData.length;j++){
                methods=methods+ "<br>" +methodData[j];
            }
            var preptimeData = data[i].preptime;
            var preptimes=0;
    
            for(j=0;j<preptimeData.length;j++){
                preptimes=preptimes+preptimeData[j];
            }
    
            var cooktimeData = data[i].cooktime;
            var cooktimes=0;
    
            for(j=0;j<cooktimeData.length;j++){
                cooktimes=cooktimes+cooktimeData[j];
            }
    
            var nutritionData = data[i].nutrition;
            var nutritions="";
    
            for(j=0;j<nutritionData.length;j++){
                nutritions=nutritions+ "<br>" +nutritionData[j];
            }
    
            str = str+"<tr><td>"+(i+1)+"</td>"+"<td>"+"<img src="+image+" width="+100+"vw height="+100+"vh></td>"+"<td>"+name+"</td>"+"<td>"+ingredients+"</td>"+"<td>"+methods+"</td>"+"<td>"+preptimes+" min</td>"+"<td>"+cooktimes+" min</td>"+"<td>"+nutritions+"</td></tr>";
        }
        document.getElementById("data").innerHTML = str;
    }
    });
  }
  $(document).ready(function() {
    setInterval(readTextFile, 5000);
});