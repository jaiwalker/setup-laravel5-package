## Laravel 5 package Development from scratch

Trying to explain Laravel specific package development in Laravel 5 :+1:

With the new Laravel 5 - `php artisan workbench` is made redundant.
And technically Laravel packages should not be tightly coupled with Laravel core, so that make sense.

But for some who wants to build Laravel specific packages I suppose this will help them to have a quick start.

### Step 1 : Install Laravel

http://laravel.com/docs/5.0#install-laravel

Note : In my above root i haven't added a .env file. You need to configure this.
Note : Laravel may require some permissions to be configured: folders within storage and vendor require write access by the web server.

#### Step 2 :  Create package folder and service provider

In root directory create a folder called `packages/vendorName/packageName/src`
e.g. `root/packages/jai/Contact/src`

Now navigate to the `src` folder and create a file for your service provider, e.g. `ContactServiceprovider.php`.

Your service provider should extend ServiceProvider and has to implement the `register` method.

Please look into this [file](https://github.com/jaiwalker/Develop-laravel5-package-/blob/master/packages/jai/Contact/src/ContactServiceprovider.php) for an example.

*If you want you can write `dd("testing");` in the boot function and go to step 3, but if you have copied the service provider file you might want to create views, routes, config and controllers.*

#### Creating Routes

In your `src` folder create a new `Http` folder in which you create your `routes.php` file.
([example file](https://github.com/jaiwalker/Develop-laravel5-package-/blob/master/packages/jai/Contact/src/Http/routes.php))

#### Creating Controllers

In your `Http` folder create a new directory called `Controllers`. In this folder you can create your controllers.
([example file](https://github.com/jaiwalker/Develop-laravel5-package-/blob/master/packages/jai/Contact/src/Http/Controllers/ContactController.php))

#### Creating Config

In your `src` folder create a new directory and call it `config`. In it create a new file (e.g. `contact.php`) like this [file](https://github.com/jaiwalker/Develop-laravel5-package-/blob/master/packages/jai/Contact/src/config/contact.php)

Note: if you want to access config - you need to publish first - after doing step 5 you can run `php artisan vendor:publish`. This will push you config file (contact.php => project/config/contact.php) and then you can access config.

#### Creating Views

This is a bit different, in your package folder (e.g. `jai/Contact`) create a new folder call `views`.
([example file 1](https://github.com/jaiwalker/Develop-laravel5-package-/blob/master/packages/jai/Contact/views/contact.blade.php) [example file 2](https://github.com/jaiwalker/Develop-laravel5-package-/blob/master/packages/jai/Contact/views/template.blade.php))

### Step 3: Add package path in root composer.json

In your root composer.json file `"jai\\Contact\\": "packages/jai/Contact/src/"` under psr-4

```
    "psr-4": {
        "App\\": "app/",
        "Jai\\Contact\\": "packages/jai/contact/src/",
    }
```

### Step 4: add service provider in app conifg.

In  your `root/config/app.php` under `providers` add your package service provider to hook your package in.

```
        'Jai\Contact\ContactServiceProvider',
```

### Step 5: loading your package
run `composer dump-autoload` - make sure there are no errors.

all done - now you can access  your package via url - "yourwebsite/contact"

## Update Included testing

There are different ways you can write test  for  your package   Global test  which is writing test in Laravel app ( not in Package ) another way is to write tests in package its self , for Global its pretty straight, I will explain how to setup  Package  test case.

## Create a new  composer.json for  your package
    - On command line navigate to package folder ("contact")  and run run `composer init` and follow the directions .
    - Add  phpunit in  your created composer.json file and run `composer install`

    ```
        "require-dev": {
                        "phpunit/phpunit": "4.8.*"
            }
    ```

## Create a phpunit.xml file in your package dir ("Contact") similar to laravel's phpunit.xml  just  without bootstrap.


## Create a dir "tests"  in your Package ( "Contact" )

    - Create common TestPackageCase.php which is very similar to TestCase.php file just with few path changes.

    - Create ContactTest.php  which extends TestPackageCase.php , now TestPackageCase.php is the  common extends files for all tests created in package this allows you create very similarly to laravel's test cases without any major changes.

## Running tests.

On command line Navigate to your package folder ("Contact")  and run  `../../../vendor/bin/phpunit` this should give you phpunit test case results.

DO share this repository if you liked it.




