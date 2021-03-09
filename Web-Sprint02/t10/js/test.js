const user = {
    name: 'Steve',
    surname: 'Rogers',
    age: 101,
    city: 'New York'
  };
  
  console.log(user);
  // {name: "Steve", surname: "Rogers", age: 101, city: "New York"}
  let cpy = copyObj(user);
  console.log(cpy);
  // {name: "Steve", surname: "Rogers", age: 101, city: "New York"}
  
  
  user.name = 'John';
  console.log(user);
  // {name: "John", surname: "Rogers", age: 101, city: "New York"}
  console.log(cpy);
  // {name: "Steve", surname: "Rogers", age: 101, city: "New York"}
  
  cpy.age = 59;
  console.log(user);
  //{name: "John", surname: "Rogers", age: 101, city: "New York"}
  console.log(cpy);
  // {name: "Steve", surname: "Rogers", age: 59, city: "New York"}
