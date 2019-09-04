(function(){
  
   var app = angular.module("postExample", []);
  
   var MenaxhimLendeshController = function($scope,$http){
    
    $http.get("http://localhost:49483/orari/api/getlendet")
                        .then(function(response){
                           return response.data; 
                        }).then(function(data){
                          $scope.Lendet=data;
                          console.log( $scope.Lendet)
                        })
    $scope.Post=function(data){
      debugger;
      const headerDict = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
 'Access-Control-Allow-Origin' : 'https://www.example2.com',
  'Access-Control-Allow-Headers': 'Content-Type',
}

const requestOptions = {                                                                                                                                                                                 
  headers: new Headers(headerDict), 
};

$http.post("http://localhost:49483/orari/api/update",this.y,requestOptions)
  .then(function(response){
                           console.log(response.data); 
                        })
}


}

  
   app.controller("MenaxhimLendeshController", MenaxhimLendeshController); 
}());