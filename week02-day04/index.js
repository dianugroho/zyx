// Task 1
console.log('Task 1 \n');
const golden = () => {
  console.log('this is golden!!');
};
golden();

// Task 2
console.log('\nTask 2 \n');
const newFunction = (firstName, lastName) => {
  return {
    fullName: () => {
      console.log(firstName + ' ' + lastName);
    },
  };
};
//Driver Code
newFunction('William', 'Imoh').fullName();

// Task 3
console.log('\nTask 3 \n');
const newObject = {
  firstName: "Harry",
  lastName: "Potter Holt",
  destination: "Hogwarts React Conf",
  occupation: "Deve-wizard Avocado",
  spell: "Vimulus Renderus!!!"
};
const { firstName, lastName, destination, occupation, spell } = newObject;
// Driver code
console.log(firstName, lastName, destination, occupation);

// Task 4
console.log('\nTask 4 \n');
const west = ["Will", "Chris", "Sam", "Holly"];
const east = ["Gill", "Brian", "Noel", "Maggie"];
const combined = [...west, ...east];
//Driver Code
console.log(combined);

// Task 5
console.log('\nTask 5 \n');
const planet = "earth" 
const view = "glass" 
var before = `Lorem ${view} dolor sit amet consectetur adipiscing elit, ${planet} do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam`;
// Driver Code 
console.log(before);
