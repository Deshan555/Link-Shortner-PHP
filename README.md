# Link Shortner PHP

This is a PHP web application that allows you to create short links using SQLite as the database. The application is easy to install and can be used to create custom short links that redirect to long URLs.

### Installation
- Clone the repository to your local machine using the following command:


```bash
git clone https://github.com/yourusername/php-sqlite-link-shortener.git
```
- Create a new database file in the database directory:

```bash
touch database/Link_List.db 

or that repo also contain database file
```

- Import the database schema using the following command:

```bash
CREATE TABLE Links_List (
    ID  INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    BASE_URL TEXT    NOT NULL
);

```
- Update the database configurations:

- Configure your web server to serve the public directory as the document root.

Visit your website and start creating short links!

### Usage
To create a new short link, enter the long URL in the input field on the home page and click the "Submit" button. The application will generate a unique short link that you can use to redirect to the long URL.


### Screenshots

![App Screenshot](https://github.com/Deshan555/Link-Shortner-PHP/blob/master/Screenshot_6.png)

