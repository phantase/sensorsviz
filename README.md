# sensorsviz

Web application to be used to view very simple sensors database.

## How to use it ?

Just clone it, launch the docker, hope you will have some data in your own database (we don't provide them), and for the moment, we don't provide also the SQL file to create the db structure, but it will come.

```
git clone https://github.com/phantase/sensorsviz.git
docker-compose up -d
```

##### For the web application
> http://`yourdockeraddress`:80

##### For the phpmyadmin to play directly with your data
> http://`yourdockeraddress`:8080

```
Root User: root / arootpassword
Application User: experiments / anexperimentspassword
```

## How to use it offline ?

If you want to use it offline, you will need to have locally some libraries not included in the Git (feel free to use submodules if you want to make nightmares after, but I think it will be easy to just download them, put them in your project. Their path is already in the .gitignore so you won't commit them to the/your repository)

##### BootStrap

Just download it from the officiel Bootstrap website http://getbootstrap.com/getting-started/ and unzip it to `dist` repository (be careful, if you just unzip without watching what you're doing, you will have too much subdirectory before arriving to the librairy).

##### JQuery

Just download the minified version and put it in `dist/js`.
