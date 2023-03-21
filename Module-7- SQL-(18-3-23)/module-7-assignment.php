<?php

/**
Assignment Name: SQL Commands Assignment
Description:
==================
In this assignment, you will be working with a fictional database of a company named "XYZ Corp." The database contains two tables, employees and departments. Your task is to write SQL commands to retrieve and manipulate data from these tables.

Instructions:
================
Use the employees table to answer the following questions:

a. Write a query to select all columns and rows from the employees table.
b. Write a query to select only the name and salary columns of all employees with a salary greater than 50000.
c. Write a query to calculate the average salary of all employees.
d. Write a query to count the number of employees who work in the "Marketing" department.
e. Write a query to update the salary column of the employee with an id of 1001 to 60000.
f. Write a query to delete all employees whose salary is less than 30000.


Use the departments table to answer the following questions:
=================================================================
a. Write a query to select all columns and rows from the departments table.
b. Write a query to select only the name and manager columns of the "Finance" department.
c. Write a query to calculate the total number of employees in each department.
d. Write a query to insert a new department called "Research" with a manager named "John Doe".

Deliverables:
===================
A text file containing all SQL commands written to answer the above questions.
A brief explanation of each SQL command and its purpose

Note: You can assume that both tables have the following columns:
employees: id, name, age, salary, department_id
departments: id, name, manager

 */

//To create the columns in the employees table:
 CREATE TABLE employees (
    id INT PRIMARY KEY,
    name VARCHAR(255),
    age INT,
    salary DECIMAL(10,2),
    department_id INT
  );
  
//   To create the columns in the departments table:
CREATE TABLE departments (
    id INT PRIMARY KEY,
    name VARCHAR(255),
    manager VARCHAR(255)
  );

  //This will calculate the average salary of all employees.
  //========================================================================================
  
// a. Write a query to select all columns and rows from the employees table.
SELECT * FROM employees; 

// b. Write a query to select only the name and salary columns of all employees with a salary greater than 50000.
SELECT name, salary FROM employees WHERE salary > 50000;

// c. Write a query to calculate the average salary of all employees.
SELECT AVG(salary) FROM employees;

// d. Write a query to count the number of employees who work in the "Marketing" department.
SELECT COUNT(*) FROM employees WHERE department_id = (SELECT id FROM departments WHERE name = 'Marketing');

// e. Write a query to update the salary column of the employee with an id of 1001 to 60000.
UPDATE employees SET salary = 60000 WHERE id = 1001; 

// f. Write a query to delete all employees whose salary is less than 30000.
DELETE FROM employees WHERE salary < 30000;


// This will return all columns and rows from the departments table.
//===================================================================================
// a. Write a query to select all columns and rows from the departments table.
SELECT * FROM departments;

// b. Write a query to select only the name and manager columns of the "Finance" department.
SELECT name, manager FROM departments WHERE name = 'Finance';

// c. Write a query to calculate the total number of employees in each department.
SELECT departments.name, COUNT(*) FROM employees JOIN departments ON employees.department_id = departments.id GROUP BY departments.name;

// d. Write a query to insert a new department called "Research" with a manager named "John Doe".
INSERT INTO departments (name, manager) VALUES ('Research', 'John Doe');

