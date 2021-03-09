const obj = {
  words: 'newspapers newspapers  books magazines'
};
console.log(obj); // {words: "newspapers newspapers  books magazines"}

addWords(obj, 'radio newspapers   ');
console.log(obj); // {words: "newspapers books magazines radio"}

removeWords(obj, 'newspapers   radio');
console.log(obj); // {words: "books magazines"}

changeWords(obj, 'books radio  magazines', 'tv internet');
console.log(obj); // {words: "tv internet"}
