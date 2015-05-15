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

            //CentresFactory.delete( centreId );
            //$scope.centres = CentresFactory.query();

            var requestURL = _APIHOST +'/centres/'+ centreId;
            $http({method: 'DELETE', url: requestURL})
				.success(function (data) {
					alert('success');
					$scope.centre = response;
				})
				.error(function (e) {
					alert('error');
					console.log(e);
				});
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
		}

        $scope.cancel = function () {
        	$location.path('/centres');	
        }
		
		// peticio al factory centre		
		$scope.centre = CentreFactory.show({id: $routeParams.id});		

	}]);



/**
*   Controller que gestiona la plana /usuaris 
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('UsuarisListCtrl', ['$scope', '$http', 'UsuarisFactory',
	function($scope, $http, UsuarisFactory) {
		// peticio al factory de centres
		$scope.usuaris = UsuarisFactory.query();				
		$scope.orderProp = 'nom';
	}]);

/**
*   Controller que crea nous alumnes
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('UsuarisAddCtrl', ['$scope', '$location', 'CentresFactory', 'TipusUsuarisFactory', 'UsuarisFactory', 
	function($scope, $location, CentresFactory, TipusUsuarisFactory, UsuarisFactory) {
		
		$scope.addPersona = function () {
            UsuarisFactory.create($scope.usuari);
            $location.path('/usuaris');
        }

        $scope.cancel = function () {
        	$location.path('/usuaris');	
        }

        // peticio al factory de centres
		$scope.centres = CentresFactory.query();

		// peticio al factory de tipus d'usuari
		$scope.idTipusUsuari = TipusUsuarisFactory.query();


	}]);

/**
*   Controller que edita alumnes
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('UsuarisEditCtrl', ['$scope', '$http', '$routeParams', '$location', 'UsuarisFactory',
	function($scope, $http, $routeParams, $location, UsuarisFactory) {

		$scope.updateCentre = function() {
			UsuarisFactory.update( $scope.centre );
			$location.path('/usuaris');

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
        	$location.path('/usuaris');	
        }
		
		// peticio al factory centre		
		$scope.centre = UsuarisFactory.show({id: $routeParams.id});		

	}]);



/**
*   Controller que gestiona la plana /missatges
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('MissatgesListCtrl', ['$scope', '$http', 
	function($scope, $http) {
		
	}]);
