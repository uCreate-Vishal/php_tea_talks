
## UTC-time

This project is created to show data to all users according to their respective local time. i.e. accessing the data from different countries/time-zones would fetch data in local time everytime. 
Also this project shows how we can use Request validations for validating requests in Laravel.

## About Project

- Language: PHP (^7.1.*)
- Framework: Laravel ( 5.7.* )
- Database: PostgreSql

## How to install project on local
  
    Open CLI and run following commands to set up at local:
   - **Clone the project**
        > 
            git clone https://github.com/uCreate-Vishal/php_tea_talks.git

   - **Set permissions**
       >
            sudo chmod -R 777 { project-storage-path }
            sudo chmod -R 777 { project-bootstrap-path }

   - **Go to project directory**
       >
            cd /php_tea_talks/POCs/utc-time        

 - **Install the dependencies**    
 >
           composer install
  


## Database installation
- **How to install postgresql ( Ubuntu )**
    >
        sudo apt-get install postgresql postgresql-contrib
- **Which UI being used to connect to DB**
    >
        pgadmin
- **Create  database**
    >
         1. login to pgsql
          sudo psql -h localhost -U postgres    
           2. create database utc-time;

## Post Installation steps
 - **Run database migrations**
    >
        php artisan migrate

- **Start server**
    >
        php artisan serve
        The API will be running on localhost:8000 now



## Steps to test time  
1. User signup 
  - When user signs up to platform local timezone of user is detected and stored to db.

2. Add book 
  - when user adds a new book, local time zone is converted to UTC time zone and saved to database.  	
 
3. Listing 
  - Any logged in user can check all the books added by different users. 
  - Local time zone of logged in user is detected. 
  - For showing details of each book Utc time of all books is fetched from db and is converted to local time zone of user.

  In this way each user can see book details i.e. publish date and time in their respective local time zone.  



## Steps for validations through Request file
1. Run following command.
 - php artisan make:Request RequestFileName;

2. Move all validations to the request file.
  - You can customize validation messages using messages() method in request file.

3. Use namespace of request file in contoller.

4. Use Request file as a method injection in controller method. 