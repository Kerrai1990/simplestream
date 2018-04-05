## Simple Stream

###Setup
- run ```composer install```
- run ```./vendor/bin/behat``` for tests

###Notes
- This test was built with PHP7.1, using a MySQL 5.7 DB
- This code was built from the ground up using TDD via behat.
- Tests can be found in the ```./features``` directory 
- I've used a few dev-dependencies purely for the use of testing with behat.
- I used PHPStorm to implement code.

###Considerations
- Considering a DB has been provided I have elected not to make any migration or seed files.
If there was a requirement for this then I would simply:
<br>
 Create a migration files for Users, Companies, and Addresses. I would create the schema with keys.
<br?
 Generate seed files for each table with test data using the Faker plugin.
 
- For quicker results I would have used another package to handle behat API testing, as there are plenty out there
but chose to make them manually for the purpose of this test.