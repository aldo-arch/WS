(function(){
  
   var app = angular.module("postExample",[]);
  
   var PedagogsController = function($scope, PedagogRepoService,$http){
var Call=function(callback){$http.get("http://localhost:49483/orari/api/getOret")
                        .then(function(response){
                           return response.data; 
                        }).then(function(data){
                          $scope.Oret=data;
                          console.log( $scope.Oret)
                        }).then(function(){
    if($scope.Ditet!=null)
                          {callback();}

                        })
                    
$http.get("http://localhost:49483/orari/api/getDitet")
                        .then(function(response){
                           return response.data; 
                        })
                      .then(function(data){
                          $scope.Ditet=data;
                          console.log( $scope.Ditet)
                        }).then(function(){
    if($scope.Oret!=null)
                          {callback();}

                        })
}
var initialize=function(){
var x = new Array($scope.Oret.length+1);
for (var i = 0; i < x.length; i++) {
  x[i] = new Array($scope.Ditet.length+1);
}
for(var z=1; z<x.length; z++)
  {
    
    x[z][0]=$scope.Oret[z-1].Hour;
  }

  for(var z=0; z<x[0].length; z++)
  {

if(z==0)
      {x[z][0]="Oret/Ditet";}
    else
    {x[0][z]=$scope.Ditet[z-1].Day;}
  }
  $scope.Table=x;

}
  
Call(initialize);

     var onFetchError = function(message){
       $scope.error = "Error Fetching Pedagogs. Message:" +message;
     };
     
     var onFetchCompleted = function(data){
        $scope.Pedagogs =data;
     };
    var onFetchCompletedForOrari=function(data){
      console.log(data);
            initialize();
      for (var i=0; i<data.length; i++)
     {

   $scope.Table[data[i].Ora][data[i].Dita]=data[i].Dega+'|'+data[i].Lenda+'|'+data[i].Tipi+'| Viti'+data[i].Viti+'| Grupi'+data[i].Paraleli+'|'+data[i].Klasa;
  }
  console.log($scope.Table)
}
    
     var GetPedagog = function(){
       PedagogRepoService.get().then(onFetchCompleted,onFetchError);
     };
     
     GetPedagog();     
  $scope.getOrarByPedagog=function(){
    var pedagog=this.selectedPedagog.Name;
    var customUrl='http://localhost:49483/orari/api/getorari?pedagog=' + pedagog + '&SearchFromPedagog=true&paralel&Dega&viti=0';
 return $http.get(customUrl)
                        .then(function(response){
                           return response.data; 
                        }).then(onFetchCompletedForOrari,onFetchError);
   }
   };


  
   app.controller("PedagogsController", PedagogsController); 
}());