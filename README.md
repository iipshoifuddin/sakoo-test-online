## How To Configure

1. Clone This Repo : https://github.com/iipshoifuddin/sakoo-test-online.git 
2. import database From folder database to your server
3. Open Folder 'application' -> Folder 'Config' 
4. Open File database.php
3. Configure, set up first [here](#create-environment-variable)
4. Copy Your Project TO folder htdocs (your_server_public_access)
5. Open Postman desktop application or Chrome web app extension that has installed before
7. Choose HTTP Method and enter request url.(ex. localhost:3000/engineers/users)
8. You can see all the end point in routes folder or for ex. [here](#endpoint)

## Configure Database

```
$ cp .env.example .env
$ nano .env
```

```
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',(your_server_daabase)
	'username' => 'root',(your_user_database)
	'password' => '',(your_password)
	'database' => 'ci-api-structure', (with your databases)
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```

## Endpoint
```
1. localhost/project/v1/product        method[GET](Get All)
2. localhost/project/v1/product/(id)   method[GET] (Get detail)
3. localhost/project/v1/product        method[POST] (Add Data)
4. localhost/project/v1/product/(id)   method[PUT] (Update Data)
5. localhost/project/v1/product/(id)   method[DELETE] (Delete Data)
```
