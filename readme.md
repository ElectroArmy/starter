Synopsis

This is the code source before Stripe Apple Web pay was integrated and it is the base project to use before you integrate apple pay in to your web application.
This is an e-commerce site that is designed to take payments using stripe for Apple pay. It has a community notice board, social media log on integration, an activities log and much more.

Motivation

This is an ecommerce appplication that enables users to purchase game keys for use on any platform. This is written in the Laravel PHP Framework, the project additionally includes a blog and community pages to encourage participation.

Installation

Create your own vm for example install Virtual Box Install Laravel Homestead http://laravel.com/docs/5.4/homestead git clone https://github.com/ormrepo/games54.git projectname cd projectname composer install php artisan key:generate Create a database Copy .env.example file and rename it to your own .env file php artisan migrate --seed to create and populate tables

Features

Home page, Login and Registration Pages, Chat Page, Community, Basket, Blog, Support, Contact Us and Profile Pages.

Packages included

algolia search, laravel cashier, eloquent sluggable, laravel dusk, adam wathan eloquent l5, laravel scout, laravel phone, pusher php server and roumen feed.

Tests All included within the tests directory. Remember to use BrowserTestKit if you are running your tests with Laravel 5.3 and below

Contributors

Any feature requests / pull requests should include details of what you are trying to achieve (use case) to explain why your request should be implemented.

If you want to submit a bug fix, please make your changes in a new branch, then open a pull request. License

Copyright © 2013-2015 Sehinde Raji

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
