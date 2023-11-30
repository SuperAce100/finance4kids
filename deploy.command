git add .
git commit -m 'Deploy'
git push heroku master
mysql --defaults-extra-file=server.cnf heroku_3342170e85eae9d < migrate.sql