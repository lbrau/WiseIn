angular.module("BienWidget", [])
.controller('ListCtrl', function($scope) {
    var name_default = true;
    $scope.showDetail = function() {
        $scope.buttonName = "details_open.png"
        console.log('sonde angular open');
        if (true == name_default) {
            $scope.buttonName = "details_close.png"
        }
    }
});