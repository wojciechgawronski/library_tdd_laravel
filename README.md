> git clone ... 
> composer update;<br>
> sudo chmod 777 -R storage/logs/; <br>
> sudo chmod 777 -R storage/framework/; <br>
> php artisan make:test UserTest; <br>
> phpunit --filter a_book_can_be_updated; <br>
> phpunit; <br>

**By default, your application's tests directory contains two directories: Feature and Unit** 

### FeatureTests
Feature tests may test a larger portion of your code, including how several objects interact with each other or even a full HTTP request to a JSON endpoint. Generally, most of your tests should be feature tests. These types of tests provide the most confidence that your system as a whole is functioning as intended.

###UnitTests
Unit tests are tests that focus on a very small, isolated portion of your code. In fact, most unit tests probably focus on a single method. Tests within your "Unit" test directory do not boot your Laravel application and therefore are unable to access your application's database or other framework services.

*Is this workflow going to work with you? Honestly that`s up to you.*
*Only you can what's the workflow that works for you.* 

*It's good to constatly changing and evolving and looking for better ways to gain new experiences? I'm not sure, propably yes.
*New things may work or may not work. We always can make revert and go back to old ways.*

### Don't be afraid to try new things
### And when it does not work revert back to before solutions, no big deal

# Local library
Piece of soft to manage local library

* library has books
* this books are categorized
* they have assets, authors, due dates, reservations
* Library has events: they host and book clubs  

Real world, real project, real app; TDD&Laravel from scratch.

