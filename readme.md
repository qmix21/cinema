## About Cinema Guide API 

This Cinema Guide API can be used to search the  MYSQL database for information about listings of cinemas and movies and session times.

For Example you can use the below to get all movies that are playing at the cinema burwood:

http://localhost/api/cinema/burwood/sessions

The result should be in JSON formatting.


You can also use the below to get all movies at a cinema at a certain time or date:

Sessions that are on this date -> http://localhost/api/cinema/beverly-hills/sessions/2018-06-15
Sessions that are at this time -> http://localhost/api/cinema/beverly-hills/sessions/19:00:00

For more combinations of what data you want returned please take a look at the Documentation.txt.