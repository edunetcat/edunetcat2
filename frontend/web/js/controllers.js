'user strict';

var _AUTHKEY;
var _APIHOST = 'http://dev.api.edunet.cat';


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
panellAppControllers.controller('CentresListCtrl', ['$scope', '$http', 'CentresFactory',
	function($scope, $http, CentresFactory) {

		$scope.deleteCentre = function (centreId) {
			//$scope.centre = CentreFactory.show({id: centreId});	

            CentresFactory.delete( centreId );
            $scope.centres = CentresFactory.query();
        };

		// peticio al factory de centres
		$scope.centres = CentresFactory.query();		
		
		$scope.orderProp = 'nom';

	}]);



/**
*   Controller que gestiona la plana /centres 
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('CentresAddCtrl', ['$scope', '$http', '$location', 'CentresFactory',
	function($scope, $http, $location, CentresFactory) {
		
		$scope.addCentre = function () {
            CentresFactory.create( $scope.centre );
            $location.path('/centres');
        }

        $scope.cancel = function () {
        	$location.path('/centres');	
        }

	}]);



/**
*   Controller que gestiona la plana /centres 
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('CentresEditCtrl', ['$scope', '$http', '$routeParams', '$location', 'CentreFactory',
	function($scope, $http, $routeParams, $location, CentreFactory) {

		$scope.updateCentre = function() {
			CentreFactory.update( $scope.centre );
			$location.path('/centres');

			/*var requestURL = _APIHOST +'/centres/'+ $routeParams.id;
			$http.put(requestURL, $scope.centre)
				.success(function (response, status, headers, config) {
					alert('success');
					$scope.centre = response;
				})
				.error(function () {
					alert('error')
				});
			*/
		}

        $scope.cancel = function () {
        	$location.path('/centres');	
        }
		
		// peticio al factory centre		
		$scope.centre = CentreFactory.show({id: $routeParams.id});		

	}]);

