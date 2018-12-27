## The problem statement
When we use our traditional way of using primary key for reference in other tables, the sharding of database can sometimes create wrong references as the primary key when serial is incrementing.

## Solution
Instead of using primary key as foreign key, a seperate unique key is created as reference key whose only functionality is to act as reference to other tables. This solves our problem of wrong references within tables.

## How to implement the solution 
### Clone the repo
> git clone https://github.com/uCreate-Vishal/php_tea_talks.git


### Get into the repo
> cd PROJECT-NAME

### Install dependencies
> composer Install

### Migrate tables
> php artisan migrate