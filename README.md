# FishFarm Management System

The fishfarm is a web application developed using a PHP framework
named Codeigniter.MYSQL is used as database.
the fishfarm will be used to ease the record
keeping process of the fishfarm.

## Setup

follow this step to setup the system

- create database fishfarm
- update the `.env` file and set the variable such as:
  - database
  - baseurl
  - environment variable
  - etc.

## Todo

- [x] Fish: add,edit,update fish details
- [x] Fish Tank: add,edit,update fish tank details
- [x] Food: add, edit, delete food
- [x] Vaccine:
- [x] Supplier:
- [x] Client:
- [x] Staff :
- [x] Product:
- [ ] Vaccine History:
  - [ ] VH listing
  - [ ] add VH
  - [ ] view VH
  - [ ] view VH
- [ ] Food History:
  - [ ] fh listing
  - [ ] add food history
  - [ ] view food history
- [ ] Expenses:
- [ ] Purchase:
- [ ] Sales
  - [ ] order management
- [ ] Setting:
- [ ] Report
  - [ ] Fish
  - [ ] Sales
  - [ ] Purchase
  - [ ] Expense
  - [ ] financial
- [ ] backup:

## Server Requirements

PHP version 7.2 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- [xml] (enabled by default - don't turn it off )