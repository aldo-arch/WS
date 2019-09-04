(function(){
    
    var PedagogRepoService = function($http){
      
      var GetPedagog = function(Pedagogname){
            return $http.get("http://localhost:49483/orari/api/getpedagog")
                        .then(function(response){
                           return response.data; 
                        });
      };
  
      return {
          get: GetPedagog
      };
        
    };
    
    var module = angular.module("postExample");
    module.factory("PedagogRepoService", PedagogRepoService);
    
}());