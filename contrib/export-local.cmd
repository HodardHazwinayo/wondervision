@echo off
echo.
echo Extracting Structure from local Database...
mysqldump -h localhost -u root  --no-data xlogistics > structure.sql
echo.
echo Done. Extracting Data from local Database...
mysqldump -h localhost -u root --no-create-info xlogistics > data.sql
echo. 
echo Done. Check for any error above.
pause