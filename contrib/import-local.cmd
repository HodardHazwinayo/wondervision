@echo off

echo Creating tables/views etc. in Database...

rem Use this for local Mysql Server
mysql -h localhost -u root  -C xlogistics < structure.sql
echo.
mysql -h localhost -u root  -C xlogistics < data.sql
echo. 
echo Done. Check for any error above.
pause
