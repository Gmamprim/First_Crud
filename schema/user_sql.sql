Use mmd_sql_server;

create table users (
    id int identity(1,1),
    name nvarchar(50), 
    email nvarchar(50),
    senha nvarchar (255)
)