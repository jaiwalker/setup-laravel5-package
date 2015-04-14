## Laravel 5 package Development

Trying to explain laravel 5 package development 
 
 how to create laravel specific packages.
 
 With new laravel 5 - php artisan workbench is made redundant.
 And technically laravel  packages should  not be tightly coupled with laravel core, so that make sense.
 
 But for some who wants to build laravel specific packages  I suppose this will help them to have a quick start.
 
 Step 1 : Install Laravel
 
 http://laravel.com/docs/5.0#install-laravel
 
 Note : Laravel may require some permissions to be configured: folders within storage and vendor require write access by the web server.
 
 Step 2 :  Create package folder and service provider
 
 In root directory create a folder call  "packages" /"vendorName"/"packageName"/src"
 Eg: root/packages/jai/Contact/src
 
 now navigate to src folder and create a service provider class: "ContactServiceprovider.php"
 
  your service provider should extend ServiceProvider which  has to implement register method.
  
  Please look into this file 
  
  if you want  you can have dd("testing");  in boot function and go to step 3 
  but  you have copied the file  you might want to  create views , routes , config   and controllers 
  
  Creating : Routes
  in  your src folder create  routes.php   like this 
  
  creating : controller
  
  in your src folder create a new directory called  " Controllers"  and then in this folder create ContactController.php
  like this 
  
  creating Config :
  
  in your src folder create a new folder call config  and in it create file call contact.php
   like this :
   
   NOTE : if  you want to access config - you need to publish first - after doing  step 5  you can run "php artisan  vendor:publish" this
    will push  you config file (contact.php => project/conifg/contact.php) and then you can access config.
   
   Creating Views :
   
   this is a bit different , 
   in your jai/Contact folder crteate a new folder  call views    and  you can replicate these files.
   

  step 3 : add package path in root composer.json
  
  in your root composer.json  file "jai\\Contact\\": "packages/jai/Contact/src/" under psr-4
  
  
  "psr-4": {
  			"App\\": "app/",
  		  	"iddigital\\Blog\\": "packages/iddigital/Blog/src/"
  		}
  		
step 4 : add service provider  in app conifg.

  in  your root/conifg/app.php   under providers add your package service provider to hook your package in.
  
	'Illuminate\Html\HtmlServiceProvider',
	
Step 5 : run  composer dump-autoload - make sure there are no errors.

all done - now you can access  your package via url - "yourwebsite/contact"

	
## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
