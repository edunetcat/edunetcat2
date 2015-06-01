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
panellAppControllers.controller('CalendariCtrl', ['$scope', '$http', '$modal',
	function($scope, $http, $modal) {

		moment.locale('ca', {
		  week : {
		    dow : 1 // Monday is the first day of the week
		  }
		});

		//These variables MUST be set as a minimum for the calendar to work
	    $scope.calendarView = 'month';
	    $scope.calendarDay = new Date();
	    $scope.events = [
	      {
	        title: 'Semana d\'examens',
	        type: 'warning',
	        startsAt: moment().startOf('week').subtract(2, 'days').add(6, 'hours').toDate(),
	        endsAt: moment().startOf('week').add(5, 'days').add(7, 'hours').toDate()
	      },
	      {
	        title: 'Periode matriculació 2015-2016',
	        type: 'info',
	        startsAt: moment().subtract(1, 'day').toDate(),
	        endsAt: moment().add(5, 'days').toDate()
	      },
	      {
	        title: 'Fi de curs',
	        type: 'important',
	        startsAt: moment().startOf('day').add(5, 'hours').toDate(),
	        endsAt: moment().startOf('day').add(19, 'hours').toDate()
	      }
	    ];

	    

	    function showModal(action, event) {
	      $modal.open({
	        templateUrl: 'modalContent.html',
	        controller: function($scope, $modalInstance) {
	          $scope.$modalInstance = $modalInstance;
	          $scope.action = action;
	          $scope.event = event;
	        }
	      });
	    }

	    $scope.eventClicked = function(event) {
	      showModal('Clicked', event);
	    };

	    $scope.eventEdited = function(event) {
	      showModal('Edited', event);
	    };

	    $scope.eventDeleted = function(event) {
	      showModal('Deleted', event);
	    };

	    $scope.toggle = function($event, field, event) {
	      $event.preventDefault();
	      $event.stopPropagation();
	      event[field] = !event[field];
	    };
	}]);

/**
*   Controller que gestiona la plana /missatges
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('TramitsCtrl', ['$scope', '$http', 
	function($scope, $http) {
		
	}]);

/**
*   Controller que gestiona la plana /missatges
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('PerfilCtrl', ['$scope', '$http', 
	function($scope, $http) {
		
	}]);


/**
*   Controller que gestiona la plana /missatges
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('MissatgesListCtrl', ['$scope', '$http', 
	function($scope, $http) {
		
	}]);


/**
*   Controller que gestiona la plana /missatges-new
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('MissatgesListCtrl', ['$scope', '$http', 
	function($scope, $http) {
		
	}]);



/**
*   Controller que gestiona la plana /avaluacio-gestor 
*   
*   @author: Biel <bielbcm@gmail.com>
**/
panellAppControllers.controller('AvaluacioGestorCtrl', ['$scope', '$http', 'UsuarisFactory', '_',
	function($scope, $http, UsuarisFactory, _) {
		// peticio al factory de centres
		$scope.usuaris = UsuarisFactory.query(
			function (data, status) {				
				for(i=0; i<data.length; i++) {
					if(data[i].idTipusUsuari !== 1) {
						data.splice(i, 1);
					}
				}
			});		

		$scope.orderProp = 'nom';
	}]);