EventListProshoreBackend Documentation

This is Backend of a simple project that manage the variout events.
To run this project on your local first clone this project and then update composer.
Then make a env file from .env.example file.
Create a database name proshoreeventbackend or you can create you own database and then replace the database name in .env file.
Then after creating database, migrate the table with artisan comman of migration.

Greate !! Now you are good to go with the APIs of event listing projct.

About This project.

This project follows the repository pattern, where file instance and repo are created to interact and fetch data along with model. There is one helper function, resource for success and error response and traits for encryption and decryption event ids.

Only one table has been used for the project where 8 columns are there for data store.
id: for event id
description: for the event description
title: for the event title
start_Date: for the event start date 
end_Date: for the event end date

Please explore the project for more information.
