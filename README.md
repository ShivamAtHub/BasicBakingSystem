# Basic Banking System
# Created by- Shivam Darekar © 2023
## Social Media's--> LinkedIn: @shivamdarekar2206  | GitHub: @ShivamAtHub


## INDEX
- [Description](#Description)
- [Installation](#Installation)
- [How To Run](#How_To_Run)

## Description
- This is a Web Development project for The Sparks Foundation GRIP Internship of April 2023.
- The website in this project is also Responsive, it means it can run on any browser and also it is mobile/tablet compatible.
- This project includes 2 main tables 'customer' and 'transaction' which contain their respective details.
- I also have included all the images used in this project. (you can change them according to your preference)

## Requirements
- This project can be edited on any IDE, I created it using Visual Studio Code (VS Code)
- This project was made with the help of HTML, CSS, Bootstrap (5.3), MySQL, PHP.
- You will also need XAMPP installed on your computer for Apache & MySQL modules.
- This project can run on any browser. (Chrome preferred)

## Installation
- Install XAMPP on your device.
- Download this project, rename the main folder from `BasicBankingSystem-main` to `BankByShivam`
- Now place the `BankByShivam` folder in your XAMPP-->htdocs folder

``````````````
Example:
C:\xampp\htdocs\BankByShivam
``````````````
- Open up the XAMPP Control Panel by searching in the windows search and start the Apache & MySQL modules.
- Open the phpMyAdmin by entering http://localhost/phpmyadmin/ on the browser.
- Make a blank database named 'bank' and import any dummy database with 'customer' & 'transactions' tables having 10 values(rows)
- (*Note*- A dummy database will be also included, so you can use it as oer your preference)

## How_To_Run
- After successfully importing database in the above step, open a new browser window and type the following:
``````````````
http://localhost/BankByShivam/mainpage.php 
``````````````
- You will be taken to the Home page of the website from there you can visit `Home` & `Customers` through the Navigation Bar.
- Else you can scroll down to the `Service` section and check the `customers` or `transaction` history.
- Or scrolling more down you can read the `About Us` section.
- On the `Customer` page you can see all the bank's existing customers from the database we imported before.
- Here you can Choose the sender of the money below and proceed by clicking `Confirm`.
- On the `Transaction` page you can select whom to transfer the money on `Receiver` tab and the amount to be transferred on `Amount` tab.
- Click `Send Money` to transfer the money or `Cancel Transaction` to cancel the transaction
- On the Home page you can visit the `Transaction History` to view past transactions.
