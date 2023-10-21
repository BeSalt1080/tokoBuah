# Tokobuah Website Application Using CodeIgniter 4

## UI
<details>
<summary>

### Index
</summary>
  
![Screenshot 2023-10-21 150010](https://github.com/BeSalt1080/tokoBuah/assets/76785026/b6c3c92d-6055-4ef9-a319-01e4c64904a4)
</details>
<details>
<summary>

### Create
</summary>
  
![Screenshot 2023-10-21 145617](https://github.com/BeSalt1080/tokoBuah/assets/76785026/2acf0318-f491-4c5f-984d-5869b4a5ffd9)
</details>
<details>
<summary>

### Edit
</summary>
  
![Screenshot 2023-10-21 151525](https://github.com/BeSalt1080/tokoBuah/assets/76785026/945319fc-0e38-454e-b6dd-0ca43589dcdc)
</details>




## Setup

Run `composer install` & `npm install` in the terminal <br>
Copy `env` to `.env`<br>
Uncomment and modify the database-related settings in `.env` file to match your database configuration.<br>
Run `php spark migrate`<br>

Setup Finished!

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
