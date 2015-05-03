'user strict';

var _AUTHKEY;
var _APIHOST = 'http://dev.api.edunet.cat';

var panellAppServices = angular.module('panellAppServices', ['ngResource']);

//factory services per fer peticions de centres
panellAppServices.factory('CentresFactory', function ($resource) {
    return $resource(_APIHOST +'/v1/centres', {}, {
        query: { method: 'GET', isArray: true },
        create: { method: 'POST' }
    })
});

panellAppServices.factory('CentreFactory', function ($resource) {
    return $resource(_APIHOST +'/v1/centres/:id', {id: '@id'}, {
        show: { method: 'GET' },
        update: { method: 'PUT', params: {id: '@id'} },
        delete: { method: 'DELETE', params: {id: '@id'} }
    })
});


//factory services per fer peticions d'usuaris
panellAppServices.factory('UsuarisFactory', function ($resource) {
    return $resource(_APIHOST +'/v1/alumnes', {}, {
        query: { method: 'GET', isArray: true },
        create: { method: 'POST' }
    })
});

panellAppServices.factory('UsuarisFactory', function ($resource) {
    return $resource(_APIHOST +'/v1/centres/:id', {id: '@id'}, {
        show: { method: 'GET' },
        update: { method: 'PUT', params: {id: '@id'} },
        delete: { method: 'DELETE', params: {id: '@id'} }
    })
});








// per obtenir el authtoken
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