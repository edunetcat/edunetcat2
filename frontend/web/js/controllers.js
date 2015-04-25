'user strict';

var _AUTHKEY;
var _APIHOST = 'http://dev.api.edunet.cat';
var config = {
	headers:  {
        'Access-Control-Allow-Origin': 'http://dev.api.edunet.cat',
        'Access-Control-Allow-Methods': 'POST, GET, OPTIONS, PUT',
        'dataType': 'jsonp'
    }
};


$.ajax({
	url: '/index.php?r=site/token',
	type: 'GET',
	success: function(data) {
		_AUTHKEY = data;
	},
	error: function(e) {
		//en cas d'error no fer res
	}
});


/**
*   Per facilitar el desenvolupament, s'han definit tots els controllers de la 
*	SPA (Single page aplication) en un mateix fitxer. 
*   
*   @author: Biel <bielbcm@gmail.com>
**/

// crea modul per a utilitzar-lo des d'altres fitxers. Es un requisit d'Angular. 
var panellAppControllers = angular.module('panellAppControllers', []);


/**
*   Controller que gestiona la plana /panell. 
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('PanellCtrl', ['$scope',
	function($scope) {

	}]);


/**
*   Controller que gestiona la plana /logout 
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('LogoutCtrl', ['$scope', '$location',
	function($scope, $location) {
		window.location = '/logout.php';
	}]);


/**
*   Controller que gestiona la plana /centres 
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('CentresListCtrl', ['$scope', '$http', 
	function($scope, $http) {

		//$http.defaults.useXDomain = true;
        //delete $http.defaults.headers.common['X-Requested-With'];
        /*$.ajax({
			url: _APIHOST +'/v1/centres',
			type: 'GET',
			dataType: "jsonp",
			success: function(data) {
				console.log(data);
			},
			error: function(e) {
				console.log(e);
			}
		});*/

		//carrega dades de l'API
		$http.get(_APIHOST +'/v1/centres', config)
		.success(function(data, status) {
			alert(status);
			$scope.centres = data;		
		})
		.error(function(data, status) {
			alert(status);
		});

		// propietat utilitzada per definir l'ordre de visualització
		$scope.orderProp = 'name';

	}]);



/**
*   Controller que gestiona la plana /centres 
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('CentresAddCtrl', ['$scope', '$http', 
	function($scope, $http) {
		
	}]);



/**
*   Controller que gestiona la plana /centres 
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('CentresEditCtrl', ['$scope', '$http', '$routeParams', '$location',
	function($scope, $http, $routeParams, $location) {

	}]);