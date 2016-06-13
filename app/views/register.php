<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $panelInit->settingsArray['siteTitle'] . " | " . $panelInit->language['registerNewAccount']; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
       	<link href="<?php echo URL::to('/'); ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL::to('/'); ?>/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL::to('/'); ?>/assets/css/datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL::to('/'); ?>/assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL::to('/'); ?>/assets/css/jquery.gritter.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL::to('/'); ?>/assets/css/fullcalendar.css" rel="stylesheet" type="text/css" />        
        <link href="<?php echo URL::to('/'); ?>/assets/css/schoex.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black" ng-app="schoex" ng-controller="registeration">

        <div class="form-box" id="login-box">
            <div class="header"><?php echo $panelInit->language['registerAcc']; ?></div>
            <form ng-submit="tryRegister()" method="post" role="form" name="registerationForm" novalidate>
                <div class="body bg-gray">
                    <section class="content" ng-show="views.register">
            		<?php
                    if($errors->any()){
					   ?>
                       <h4 style='color:red;'>{{$errors->first()}}</h4>
                       <?php
                    }
					?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4"><input type="radio" name="role" value="teacher" ng-model="form.role" /> <?php echo $panelInit->language['teacher']; ?> </div>
                            <div class="col-md-4"><input type="radio" name="role" value="student" ng-model="form.role"/> <?php echo $panelInit->language['student']; ?> </div>
                            <div class="col-md-4"><input type="radio" name="role" value="parent" ng-model="form.role"/> <?php echo $panelInit->language['parent']; ?> </div>
                        </div>
                    </div>
                    <div class="form-group" ng-class="{'has-error': registerationForm.username.$invalid}">
                        <input type="text" name="username" class="form-control" ng-model="form.username" required placeholder="<?php echo $panelInit->language['username']; ?>"/>
                    </div>
                    <div class="form-group" ng-class="{'has-error': registerationForm.email.$invalid}">
                        <input type="text" name="email" class="form-control" placeholder="<?php echo $panelInit->language['email']; ?>" ng-model="form.email" ng-pattern="/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/"/>
                    </div>
                    <div class="form-group" ng-class="{'has-error': registerationForm.password.$invalid}">
                        <input type="password" name="password" class="form-control" required placeholder="<?php echo $panelInit->language['password']; ?>" ng-model="form.password" required/>
                    </div>
                    <div class="form-group" ng-class="{'has-error': registerationForm.fullName.$invalid}">
                        <input type="text" name="fullName" class="form-control" required placeholder="<?php echo $panelInit->language['FullName']; ?>" ng-model="form.fullName"/>
                    </div>

                    <div class="form-group" ng-show="form.role == 'parent'">
                        <input type="text" name="parentProfession" class="form-control" placeholder="<?php echo $panelInit->language['Profession']; ?>" ng-model="form.parentProfession"/>
                    </div>

                    <div class="form-group" ng-show="form.role == 'student'">
                        <input type="text" name="studentRollId" class="form-control" placeholder="<?php echo $panelInit->language['rollid']; ?>" ng-model="form.studentRollId"/>
                    </div>
                    <div class="form-group" ng-show="form.role == 'student'">
                        <select class="form-control" name="studentClass" ng-model="form.studentClass" >
                          <option ng-repeat="class in classes" value="{{class.id}}">{{class.className}}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" name="birthday" class="form-control datemask" placeholder="<?php echo $panelInit->language['Birthday']; ?>" ng-model="form.birthday"/>
                    </div>
                    <div date-picker selector=".datemask" ></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4"><input type="radio" name="gender" value="teacher" ng-model="form.gender"/> <?php echo $panelInit->language['Male']; ?> </div>
                            <div class="col-md-4"><input type="radio" name="gender" value="student" ng-model="form.gender"/> <?php echo $panelInit->language['Female']; ?> </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="<?php echo $panelInit->language['Address']; ?>" ng-model="form.address"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phoneNo" class="form-control" placeholder="<?php echo $panelInit->language['phoneNo']; ?>" ng-model="form.phoneNo"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="mobileNo" class="form-control" placeholder="<?php echo $panelInit->language['mobileNo']; ?>" ng-model="form.mobileNo"/>
                    </div>
                    <div class="form-group" ng-show="form.role == 'parent'">
                        <input type="text" name="parentOf" class="form-control" placeholder="<?php echo $panelInit->language['parntStudentIdSep']; ?>" ng-model="form.parentOf"/>
                        <small><?php echo $panelInit->language['youfindStId']; ?> <b>student-1234</b></small>
                    </div>
                    </section>
                    <section class="content" ng-show="views.thanks">
                        <?php echo $panelInit->language['thankReg']; ?> : <span ng-bind="regId"></span>
                    </section>
                </div>
                <div class="footer">
                    <section class="content" ng-show="views.register">
                        <button type="submit" ng-disabled="registerationForm.$invalid" class="btn bg-olive btn-block"><?php echo $panelInit->language['registerNewAccount']; ?></button>  
                        <p><a href="<?php echo URL::to('/forgetpwd'); ?>"><?php echo $panelInit->language['restorePwd']; ?></a></p>
                    </section>
                    <section class="content" ng-show="views.thanks">
                        <p><a href="<?php echo URL::to('/login'); ?>"><?php echo $panelInit->language['signIn']; ?></a></p>
                    </section>
                </div>
            </form>
        </div>
        <div class="overlay"></div>
        <div class="loading-img"></div>
        <Br/><br/><br/>

        <script src="<?php echo URL::to('/'); ?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo URL::to('/'); ?>/assets/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo URL::to('/'); ?>/assets/js/moment.js" type="text/javascript"></script>
        <script src="<?php echo URL::to('/'); ?>/assets/js/fullcalendar.min.js" type="text/javascript"></script>
        <script src="<?php echo URL::to('/'); ?>/assets/js/jquery.gritter.min.js" type="text/javascript"></script>
        
        <script src="<?php echo URL::to('/'); ?>/assets/js/Angular/angular.min.js" type="text/javascript"></script>
        <script src="<?php echo URL::to('/'); ?>/assets/js/Angular/AngularModules.js" type="text/javascript"></script>
        <script src="<?php echo URL::to('/'); ?>/assets/js/Angular/app.js"></script>
        <script src="<?php echo URL::to('/'); ?>/assets/js/Angular/routes.js" type="text/javascript"></script>
        
        <script src="<?php echo URL::to('/'); ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo URL::to('/'); ?>/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

        <script src="<?php echo URL::to('/'); ?>/assets/js/schoex.js" type="text/javascript"></script>
    </body>
</html>