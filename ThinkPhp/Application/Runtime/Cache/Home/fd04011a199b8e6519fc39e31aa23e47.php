<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" ng-app="myapp">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
</head>
<body>
<div ng-controller="http">
    <ul>
        <li ng-repeat="x in list">
            <span>{{x.b_id}}</span>
            <span>{{x.b_bookname}}</span>
            <span>{{x.b_type}}</span>
        </li>
    </ul>
</div>
</body>
<script src="http://apps.bdimg.com/libs/angular.js/1.4.6/angular.min.js"></script>
<script>
    var app = angular.module("myapp",[]);
    app.controller("http",function( $scope , $http ){
        $http.get('<?php echo U("Angular/angularHttpList");?>').success(function(data){
            $scope.list = data;
        })
    })
</script>
</html>