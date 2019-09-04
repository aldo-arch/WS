(function TestController(){
  
   var app = angular.module("postExample", ['ui.bootstrap']);
  
   var TestController = function($scope,$http){
    
    
$scope.Name="Hi";


}

  
   app.controller("TestController", TestController); 
}());