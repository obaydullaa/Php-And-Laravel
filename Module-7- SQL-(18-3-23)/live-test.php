<?php


CREATE TABLE students (
    id INT PRIMARY KEY,
    name VARCHAR(50),
    age INT
);

INSERT INTO students (id, name, age) VALUES
    (1, 'Alice', 20),
    (2, 'Bob', 18),
    (3, 'Charlie', 22),
    (4, 'David', 25),
    (5, 'Eve', 19),
    (6, 'Frank', 23);

SELECT name, age
FROM students
WHERE age BETWEEN 18 AND 25
ORDER BY age ASC;
