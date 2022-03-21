var fruits, text, fLen, i;
fruits = ["Banana", "Orange", "Apple", "Mango"];
fruits[1] = "Grapes";
fruits[4] = "Avocado";
fruits[5] = "Pineapple";
  
fLen = fruits.length;
for (i = 0; i < fLen; i++) {
  if (i == 4)
    continue;
document.write(fruits[i]+"</br>");
}