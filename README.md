## Install

- Clone this repository by typing it in the console or terminal

- type in console or terminal `composer install --ignore-platform-req=ext-mongodb`

- copy or rename file **.env.example** to **.env** and configuration your database

- setting database **mongodb url** in **.env**

- and type in console or terminal `php artisan key:generate` for security.

- run in terminal or console and type `php artisan serve` for running server in local

- export collection postman API in **postman** folder

  

## api

### Authentication

**Login User**

    http://127.0.0.1:8000/api/users/login

input :
**email : string
password : string**

**Register User**

    http://127.0.0.1:8000/api/users/add

Input :
**username : string
email : string
password : string**

**Logout Token User**

must have token

    http://127.0.0.1:8000/api/users/logout

### Vehicles Data

Must have token

**Get All Vehicles** 

    http://127.0.0.1:8000/api/vehicles
  
  
Add Vehicle

http://127.0.0.1:8000/api/vehicles/add

input is 2 type
motor type :

    {
    
    "year":  2022, (integer)
    
    "color":  "silver", (string)
    
    "price":  70000000, (integer)
    
    "type":  "motor", (string)
    
    "machine":  "Ertiga", (string)
    
    "suspension_type":  "Upside Right", (string)
    
    "transmision_type":  "Manual" (string)
    
    }

Car Type :

    {
    
    "year":  2022, (integer)
    
    "color":  "blue", (string)
    
    "price":  100000000, (integer)
    
    "type":  "car", (string)
    
    "machine":  "Toyota", (string)
    
    "capacity":  5, (integer)
    
    "car_type":  "Sedan" (string)
    
    }


**Sold Vehicle**

Params :
**id** : **id vehicle** (string)

    http://127.0.0.1:8000/api/vehicles/sold/{id}


**Get Sales Report**

    http://127.0.0.1:8000/api/vehicles/reports
