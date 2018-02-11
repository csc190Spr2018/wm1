DROP DATABASE IF EXISTS testuname;
CREATE DATABASE testuname;
USE testuname;
CREATE TABLE users(
    uname varchar(255) PRIMARY KEY,
    encpwd varchar(255)
);
