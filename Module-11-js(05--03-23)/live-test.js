// Question

//  Write a function called "gradeCalculator" that takes a numerical grade (out of 100) as input and returns a letter grade (A, B, C, D, or F) based on the following grading scale:
//   A: 90-100
//   B: 80-89
//   C: 70-79
//   D: 60-69
//   F: 0-59
// If the input is not a number between 0 and 100, return an error message.


// Test Data:

// The function should return "B" when given the input 85.

function gradeCalculator(grade) {
    if (typeof grade !== 'number' || grade < 0 || grade > 100) {
      return "Please input Grade number Must be A Number Between 0 And 100";
    } else if (grade >= 90) {
      return "A";
    } else if (grade >= 80) {
      return "B";
    } else if (grade >= 70) {
      return "C";
    } else if (grade >= 60) {
      return "D";
    } else {
      return "F";
    }
  }
  
  // Test:
  console.log(gradeCalculator(85)); // Output: "B"
  