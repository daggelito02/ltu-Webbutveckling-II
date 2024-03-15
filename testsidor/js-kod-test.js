var integer = new Array(10);
integer[0] = "10";
integer[1] = "20";
integer[2] = "30";
integer[3] = "40";
integer[4] = "50";
integer[5] = "60";
integer[6] = "70";
integer[7] = "80";
integer[8] = "90";
integer[9] = "100";
// Tar fram ett slumpvärde mellan 0-6
const nr = Math.floor(Math.random() * 10);
document.writeln("<p>" + integer[nr] + "</p>");
document.writeln("Uppdatera sidan för ett nytt tal!");
console.log(integer);


let rangeArray = [];
const range = function(nr = null) {
    console.log('nr:', nr);
    
    
        rangeArray.push(nr);
    
    return rangeArray;
}
var testArray = range(integer[nr]);
console.log('Uppgift 2: testArray =', testArray);

function randomArray(length, min, max) {
    return Array.apply(null, Array(length)).map(function() {
        return Math.round(Math.random() * (min - max) + max);
    });
}

var test = randomArray(10, 1, 100);
console.log('test: ', test)
const sorted = test.sort((a,b)=>a-b);
console.log('sorted:', sorted);

console.log(Math.round(0));


document.writeln("</li></ul>");

test2.forEach((number) => console.log('forEach: ',number));

const array1 = ['c', 'a', 'b'];

array1.forEach((element) => console.log(element));

test2.forEach( number => {
    document.writeln("<span>" + number + "</span>");
});
var arr = [];
while(arr.length < 8){
    var r = Math.round(Math.random() * (1 -100) + 100);
    if(arr.indexOf(r) === -1) arr.push(r);
}
console.log('arr: ', arr);