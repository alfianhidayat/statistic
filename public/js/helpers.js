function urlCombination(arr) {
  if(arr.length == 1){
		return arr[0];
	}else{
    var result = [];
		var test = urlCombination(arr.slice(1));
		for(i = 0; i < test.length; i++){
			for(x = 0; x < arr[0].length; x++){
				var restUrl = typeof test[i].url != "undefined" ? "&"+test[i].url : "&"+test[i].name+"="+encodeURIComponent(test[i].value);
        var restName;
        if(typeof test[i].title != "undefined"){
          restName = test[i].title;
        }else{
          if(test[i].name.indexOf("appId")!= -1){
            restName = "";
          }else{
            restName = test[i].value;
          }
        }
        var newName;
        if(arr[0][x].name.indexOf("Date") != -1 || arr[0][x].name.indexOf("appId") != -1 || arr[0][x].name.indexOf("counterType") != -1){
          newName = "";
        }else{
          newName = arr[0][x].value+"/";
        }
				result.push({
					title : newName+""+restName,
					url : arr[0][x].name+"="+encodeURIComponent(arr[0][x].value)+""+restUrl
				});
			}
		}
		return result;
	}
}
