
## UTC-time

This project is created to show synchronized data to all users according to their respective local time. i.e. accessing the data from diffrent countries/time-zones would fetch data in local time everytime. 
Also this project shows how we can use Request validations for validating requests in Laravel.

## About Project

- Language: PHP (^7.1.*)
- Framework: Laravel ( 5.7.* )
- Database: PostgreSql


## Steps performed 
1. User signup 
  - When user signs up to platform local timezone of user is detected and stored to db.

2. Add book 
  - when user adds a new book local time zone is converted to UTC time zone and saved to database.  	
 
3. Listing 
  - Any logged in user can check all the books added by diffrent users. 
  - Local time zone of logged in user is detected. 
  - For showing details of each book Utc time of all books is fetched from db and is converted to local time zone of user.

  In this way each user can see book details i.e. publish date and time in their respective local time zone.  



## Steps for validations thorugh Request file
1. Run following command.
 - php artisan make:Request RequestFileName;

2. Move all validations to the request file.
  - You can customize validation messages using messages() method in request file.

3. Use namespace of request file in contoller.

4. Use Request file as a method injection in controller method. 