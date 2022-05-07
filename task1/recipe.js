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
        }
    }
}
    )
}
