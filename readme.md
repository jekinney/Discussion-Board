<h2 align="center">Proof of concept for a stand alone discusion board</h2>


## Build With Laravel

Built using laravel version 5.3. Plans to utilize Laravel Echc, Scout and Passport.
Currently using socialit for Facebook, Google and Github authentication

## Purpose

This is a display/side project. As many times you can not use production code from clients and contacts to use as reference. This is one of a few repos to display code and code style.

## Overview

Utilizing Eloquent for all database queries, Redis Caching, Marietta Database, Pusher for notifications (Laravel Echo),
Vue.js, Bootstrap (for now).

High use of Traits to keep models clean and minimal, Seperated folders in App for the different features: App/Boards contains all the models, observers and traits associated with the board feature. App/Users contains all folders and files for User related data, etc...

Controllers are also sperated by feature: App/Http/Controllers/Boards contains all the board related controllers etc...

Utilizing Form requests for validation when applicable.

Utilizing Middleware for route authorization when applicable.

Utilizing laravel Socialite for user's to login and register with in a click or two. 

Utilizing gravatar and Amazon s3 for avatar images via Laravel's filesystem.


## License

licensed under the [MIT license](http://opensource.org/licenses/MIT).
