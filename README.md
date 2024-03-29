Symfony Blog Application
========================
This is a simple blog application with overview of blog messages, blog detail, validation, comments.
Backend only.

Requirements
------------

  * PHP 8.2.4 or higher;
  * [usual Symfony application requirements][1].

Installation
------------

```bash
# clone the code repository and install its dependencies
$ git clone https://github.com/mb-9/blog.git my_project
$ cd my_project/
$ composer install
```

Database
--------

Set up connection string in .env and run 

```bash
symfony console doctrine:migrations:migrate
```


Fixtures
-----

```bash
symfony console doctrine:fixtures:load 
```


Tests
-----

Execute this command to run tests:

```bash
$ cd my_project/
$ php /bin/phpunit
```

[1]: https://symfony.com/doc/current/setup.html#technical-requirements
