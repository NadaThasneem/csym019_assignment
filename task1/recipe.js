
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
            var name = "<p style=\"font-size:1.4rem\"> <strong>"+data[i].name + "</strong> </p>";
            var author = data[i].author;

            var ingredientsData = data[i].ingredients;
    
            var ingredients="<ul class=\"list-group list-group-flush\">";
    
            for(j=0;j<ingredientsData.length;j++){
                ingredients = ingredients + "<li class=\"list-group-item list-group-item-dark\">" + ingredientsData[j] + "</li>";
            }

            ingredients = ingredients + "</ul>"
    
            var methodData = data[i].method;
            var methods="<ul class=\"list-group list-group-flush\">";
    
            for(j=0;j<methodData.length;j++){
                methods=methods+ "<li class=\"list-group-item list-group-item-dark\"><b>Step "+(j+1)+": </b>" + methodData[j] + "</li>";
            }

            methods=methods+"</ul>"

            var preptimes=data[i].preptime;
    
            var cooktimes=data[i].cooktime;
    
            var nutritionData = data[i].nutrition;
            var nutritions="<ul class=\"list-group list-group-flush\">";
    
            for(j=0;j<nutritionData.length;j++){
                nutritions=nutritions+ "<li class=\"list-group-item list-group-item-dark\">" +nutritionData[j] + "</li>";
            }

            nutritions = nutritions + "</ul>"
    
            str = str+"<tr><td scope="+"row"+">"+(i+1)+"</td>"+"<td class=\"align-middle\">"+"<img src="+image+" width="+100+"vw height="+100+"vh></td>"+"<td>"+name+"</td>"+"<td>"+author+"</td>"+"<td>"+ingredients+"</td>"+"<td>"+methods+"</td>"+"<td>"+preptimes+" min</td>"+"<td>"+cooktimes+" min</td>"+"<td>"+nutritions+"</td></tr>";
        }
        document.getElementById("data").innerHTML = str;
    }
    });
  }



$(document).ready(function() {
    setInterval(readTextFile, 5000);
});
//