## Laravel 5 package Development from scratch 

Trying to explain laravel 5 package development :+1:
 
 how to create laravel specific packages.
 With new laravel 5 - php artisan workbench is made redundant.
 And technically laravel  packages should  not be tightly coupled with laravel core, so that make sense.
 
 But for some who wants to build laravel specific packages  I suppose this will help them to have a quick start.
 
 * Step 1 : Install Laravel
 
 http://laravel.com/docs/5.0#install-laravel
 
 Note :In my above root i haven't added env file. you need to configure this. 
 Note : Laravel may require some permissions to be configured: folders within storage and vendor require write access by the web server.
 
 * Step 2 :  Create package folder and service provider
 
 In root directory create a folder call  "packages" /"vendorName"/"packageName"/src"
 Eg: root/packages/jai/Contact/src
 
 now navigate to src folder and create a service provider class: "ContactServiceprovider.php"
 
  your service provider should extend ServiceProvider which  has to implement register method.
  
  Please look into this [file](https://github.com/jaiwalker/Develop-laravel5-package-/blob/master/packages/jai/Contact/src/ContactServiceprovider.php)
 
  **If you want  you can have dd("testing");  in boot function and go to step 3** 
  but  you have copied the file  you might want to  create views , routes , config   and controllers 
  
  -Creating : Routes create a "Http" folder 
  in  your "Http" folder create  routes.php   like this [file](https://github.com/jaiwalker/Develop-laravel5-package-/blob/master/packages/jai/Contact/src/Http/routes.php)
  
  - creating : controller
  
  in your Http folder create a new directory called  " Controllers"  and then in this folder create ContactController.php
  like this [file](https://github.com/jaiwalker/Develop-laravel5-package-/blob/master/packages/jai/Contact/src/Http/Controllers/ContactController.php)

   - creating Config :
   in your /packages/jai/Contact/src/config and in it create file call contact.php
   like this :[file](https://github.com/jaiwalker/Develop-laravel5-package-/blob/master/packages/jai/Contact/src/config/contact.php)
   
   NOTE : if  you want to access config - you need to publish first - after doing  step 5  you can run "php artisan  vendor:publish" this
    will push  you config file (contact.php => project/conifg/contact.php) and then you can access config.
   
   - Creating Views :
   
   this is a bit different , 
   in your jai/Contact folder create a new folder  call views    and  you can replicate these files.
   [file1](https://github.com/jaiwalker/Develop-laravel5-package-/blob/master/packages/jai/Contact/views/contact.blade.php)
   [file2](https://github.com/jaiwalker/Develop-laravel5-package-/blob/master/packages/jai/Contact/views/template.blade.php)
   
  * Step 3 : add package path in root composer.json
  
  in your root composer.json  file "jai\\Contact\\": "packages/jai/Contact/src/" under psr-4
  
```
  "psr-4": {
  			"App\\": "app/",
            "Jai\\Contact\\": "packages/jai/contact/src/",
  		}
```  		
Once you have added this - run composer dump-autoload

* step 4 : add service provider  in app conifg.

  in  your root/conifg/app.php   under providers add your package service provider to hook your package in.
  ```
    		'Jai\Contact\ContactServiceProvider',
	```
	
* Step 5 : run  composer dump-autoload - make sure there are no errors.

all done - now you can access  your package via url - "yourwebsite/contact"
DO share it you like it .

	
## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
