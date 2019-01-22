## About Custom API Exception
 This POC project/app is a demonstration for Using custom exception handling for cleaner code for API development.

## Why?

1. To return proper formatted response for API instead of default laravel exception response(Json or web view for GET requests).
2. Throw Exception with custom message.

## Solution:
- Get Exception details i.e. Message, Exception Data (in-case of custom exception) and return them in decided format for API. This can be done either by extending the default Excepton Handler OR can be done conditionaly in default Handler.
- Make custom/new Exception accepting the parameters you want to customize and through Exception with those custom details.

## How to implement the solution 
### Clone the repo
> git clone https://github.com/uCreate-Vishal/php_tea_talks.git

### Get into the repo
> cd PROJECT-NAME i.e. cd php_tea_talks/POCs/custom-api-exception/

### Install dependencies
> composer Install

### Run App
> php artisan serve

## Run Demo
As this POC is only build for APIs so to run demonstration either you setup any frontend API integration OR any API Testing tool like [Postman](https://learning.getpostman.com/getting-started/).

As example there is an API endpoint available: 
> GET {APP_URL}/api/show-api-exception
