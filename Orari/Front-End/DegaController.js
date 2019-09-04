(function(){
    
   var app = angular.module("postExample",[]);
  
   var DegasController = function($scope, $http){
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
       $scope.error = "Error Fetching . Message:" +message;
     };
     
     var onFetchCompletedForDega = function(data){
        $scope.Degas =data;
     };
         var onFetchCompletedForViti = function(data){
        $scope.Vitis =data;
     };

     var onFetchCompletedForParalel = function(data){
        $scope.Paralels =data;
     };
     
     var GetDega = function(){
                 return $http.get("http://localhost:49483/orari/api/getdeget")
                        .then(function(response){
                           return response.data; 
                        }).then(onFetchCompletedForDega,onFetchError);
     };

                  var GetViti = function(){
            return $http.get("http://localhost:49483/orari/api/getviti")
                        .then(function(response){
                           return response.data; 
                        }).then(onFetchCompletedForViti,onFetchError);;
     };
         var GetParalel = function(){
                return $http.get("http://localhost:49483/orari/api/getparalel")
                        .then(function(response){
                           return response.data; 
                        }).then(onFetchCompletedForParalel,onFetchError);
     };
     
     GetDega();     
     GetViti();
     GetParalel();
     
    var onFetchCompletedForOrari=function(data){
      console.log(data);
            initialize();
      for (var i=0; i<data.length; i++)
     {

   $scope.Table[data[i].Ora][data[i].Dita]=data[i].Lenda+'|'+data[i].Tipi+'|'+data[i].Klasa;
  }
  console.log($scope.Table)
}
    
     
  $scope.getOrarByCriteria=function(){
  var degaid=this.selectedDega;
  var viti=this.selectedViti;
  var paralel=this.selectedParalel;
  var customUrl="http://localhost:49483/orari/api/getorari?pedagog=0&paralel="+paralel+"&Dega="+degaid+"&SearchFromPedagog=false&viti="+viti;
 return $http.get(customUrl)
                        .then(function(response){
                           return response.data; 
                        }).then(onFetchCompletedForOrari,onFetchError);
   }







   };
  
   app.controller("DegasController", DegasController);
  
}());