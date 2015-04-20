'user strict';

var _AUTHKEY;

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
*   Controller que gestiona la plana /panell 
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('PanellCtrl', ['$scope',
	function($scope) {

	}]);


/**
*   Controller que gestiona la plana /panell 
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('LogoutCtrl', ['$scope', '$location',
	function($scope, $location) {
		console.log("redirect");
		//$location.path("http://dev.edunet.cat/logout.php");
		window.location = '/index.php?r=site/logout';
	}]);


/**
*   Controller que gestiona la plana /centres 
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('CentresListCtrl', ['$scope', '$http', 
	function($scope, $http) {

		//TODO: fer que carregui conecti a l'API
		//carrega dades de l'API
		$http.get('js/todelete.json').success(function(data) {
			$scope.centres = data;		
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