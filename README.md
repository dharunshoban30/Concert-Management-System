# 🎵 Concert Management System - LaraConcerts

## Overview
This is a comprehensive concert event management system called 'LaraConcerts' designed to simplify the organisation and participation of concert events. The system was created using the **Laravel framework**, which includes PHP, HTML, JavaScript and CSS. The system caters to two distinct user groups: administrators (admins) and end users, each equipped with tailored functionalities to enhance their experience and interaction with the platform.

For end users, the system provides an extensive set of features including the ability to create user accounts, view upcoming concert events, edit personal account information, delete their accounts, book tickets for events, and review their ticket bookings. 
On the administrative side, the system provides tools for creating and managing concert events which include updates and event deletion, viewing event attendees, and editing admin account details.

A key feature of the system is the integration of the **Stripe Payment API**, enabling secure and convenient payment processing for ticket bookings. Additionally, the system is designed to be mobile responsive so that users are able to access the system on devices other than their computer.


## Objectives
The primary objectives of this project are:
- Improve Ticket Booking Efficiency: Streamline the ticket booking process to make it faster and more user-friendly, reducing frustration among concert-goers.
- Enhance Management of Attendee Information: Develop a system that allows for accurate and easy management and access to attendee information, facilitating better event planning and execution.
- Simplify Payment Processing: Integrate a secure and straightforward payment system to streamline transactions and remove barriers to ticket sales.
- Create an Integrated Platform: Establish a comprehensive platform that supports effective communication and event promotion, improving experiences for both administrators and users.


## Setup Instructions
To execute the website, follow these steps:
1) Set up folder path in command prompt
   - `cd` to LARACONCERTS
2) Run Migrations:
   - Execute 'php artisan migrate' to create  database tables.
3) Seed Database:
   -Run 'php artisan db:seed' to populate the database with admin account.

    admin email    :admin@admin.com
    admin password :admin123
 
4) Start Development Server:
   - Run php artisan serve to launch a development server at http://localhost:8000.

5) The user account have to be created upon running the web application
6) Use the Admin account to create the events. Only then can all the functionalities work.
