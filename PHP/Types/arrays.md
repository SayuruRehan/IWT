Arrays 
===================
An array in PHP is actually an ordered map. A map is a type that associates values to keys. This type is optimized for several different uses; it can be treated as an array, list (vector), hash table (an implementation of a map), dictionary, collection, stack, queue, and probably more. As array values can be other arrays, trees and multidimensional arrays are also possible.

Explanation of those data structures is beyond the scope of this manual, but at least one example is provided for each of them. For more information, look towards the considerable literature that exists about this broad topic.

Syntax 
===================
Specifying with array() 

An array can be created using the array() language construct. It takes any number of comma-separated key => value pairs as arguments.

array(

    key  => value,
    key2 => value2,
    key3 => value3,
    ...
)


The comma after the last array element is optional and can be omitted. This is usually done for single-line arrays, i.e. array(1, 2) is preferred over array(1, 2, ). For multi-line arrays on the other hand the trailing comma is commonly used, as it allows easier addition of new elements at the end.

Note:

A short array syntax exists which replaces array() with [].

Example #1 A simple array

<?php

$array = array(
    "foo" => "bar",
    "bar" => "foo",
);


// Using the short array syntax

$array = [
    "foo" => "bar",
    "bar" => "foo",
];
?>

The key can either be an int or a string. The value can be of any type.

Additionally the following key casts will occur:

Strings containing valid decimal ints, unless the number is preceded by a + sign, will be cast to the int type. 

E.g. the key "8" will actually be stored under 8. On the other hand "08" will not be cast, as it isn't a valid decimal integer.

Floats are also cast to ints, which means that the fractional part will be truncated. E.g. the key 8.7 will actually be stored under 8.

Bools are cast to ints, too, i.e. the key true will actually be stored under 1 and the key false under 0.
Null will be cast to the empty string, i.e. the key null will actually be stored under "".

Arrays and objects can not be used as keys. Doing so will result in a warning: Illegal offset type.
If multiple elements in the array declaration use the same key, only the last one will be used as all others are overwritten.

Example #2 Type Casting and Overwriting example

<?php
$array = array(
    1    => "a",
    "1"  => "b",
    1.5  => "c",
    true => "d",
);

var_dump($array);
?>
The above example will output:

array(1) {
  [1]=>
  string(1) "d"
}


As all the keys in the above example are cast to 1, the value will be overwritten on every new element and the last assigned value "d" is the only one left over.

PHP arrays can contain int and string keys at the same time as PHP does not distinguish between indexed and associative arrays.


Example #3 Mixed int and string keys


<?php
$array = array(
    "foo" => "bar",
    "bar" => "foo",
    100   => -100,
    -100  => 100,
);
var_dump($array);
?>


The above example will output:

array(4) {
  ["foo"]=>
  string(3) "bar"
  ["bar"]=>
  string(3) "foo"
  [100]=>
  int(-100)
  [-100]=>
  int(100)
}

The key is optional. If it is not specified, PHP will use the increment of the largest previously used int key.

Example #4 Indexed arrays without key

<?php
$array = array("foo", "bar", "hello", "world");
var_dump($array);
?>
The above example will output:

array(4) {
  [0]=>
  string(3) "foo"
  [1]=>
  string(3) "bar"
  [2]=>
  string(5) "hello"
  [3]=>
  string(5) "world"
}
It is possible to specify the key only for some elements and leave it out for others:

Example #5 Keys not on all elements

<?php
$array = array(
         "a",
         "b",
    6 => "c",
         "d",
);
var_dump($array);
?>
The above example will output:

array(4) {
  [0]=>
  string(1) "a"
  [1]=>
  string(1) "b"
  [6]=>
  string(1) "c"
  [7]=>
  string(1) "d"
}

As you can see the last value "d" was assigned the key 7. This is because the largest integer key before that was 6.

Example #6 Complex Type Casting and Overwriting example

This example includes all variations of type casting of keys and overwriting of elements.

<?php
$array = array(
    1    => 'a',
    '1'  => 'b', // the value "a" will be overwritten by "b"
    1.5  => 'c', // the value "b" will be overwritten by "c"
    -1 => 'd',
    '01'  => 'e', // as this is not an integer string it will NOT override the key for 1
    '1.5' => 'f', // as this is not an integer string it will NOT override the key for 1
    true => 'g', // the value "c" will be overwritten by "g"
    false => 'h',
    '' => 'i',
    null => 'j', // the value "i" will be overwritten by "j"
    'k', // value "k" is assigned the key 2. This is because the largest integer key before that was 1
    2 => 'l', // the value "k" will be overwritten by "l"
);

var_dump($array);
?>

The above example will output:

array(7) {
  [1]=>
  string(1) "g"
  [-1]=>
  string(1) "d"
  ["01"]=>
  string(1) "e"
  ["1.5"]=>
  string(1) "f"
  [0]=>
  string(1) "h"
  [""]=>
  string(1) "j"
  [2]=>
  string(1) "l"
}
Accessing array elements with square bracket syntax ¶
Array elements can be accessed using the array[key] syntax.

Example #7 Accessing array elements

<?php
$array = array(
    "foo" => "bar",
    42    => 24,
    "multi" => array(
         "dimensional" => array(
             "array" => "foo"
         )
    )
);

var_dump($array["foo"]);
var_dump($array[42]);
var_dump($array["multi"]["dimensional"]["array"]);
?>
The above example will output:

string(3) "bar"
int(24)
string(3) "foo"
Note:

Prior to PHP 8.0.0, square brackets and curly braces could be used interchangeably for accessing array elements (e.g. $array[42] and $array{42} would both do the same thing in the example above). The curly brace syntax was deprecated as of PHP 7.4.0 and no longer supported as of PHP 8.0.0.

Example #8 Array dereferencing

<?php
function getArray() {
    return array(1, 2, 3);
}

$secondElement = getArray()[1];

// or
list(, $secondElement) = getArray();
?>

Note:

Attempting to access an array key which has not been defined is the same as accessing any other undefined variable: an E_NOTICE-level error message will be issued, and the result will be null.

Note:

Array dereferencing a scalar value which is not a string yields null. Prior to PHP 7.4.0, that did not issue an error message. As of PHP 7.4.0, this issues E_NOTICE; as of PHP 8.0.0, this issues E_WARNING.

Creating/modifying with square bracket syntax ¶
An existing array can be modified by explicitly setting values in it.

This is done by assigning values to the array, specifying the key in brackets. The key can also be omitted, resulting in an empty pair of brackets ([]).

$arr[key] = value;
$arr[] = value;
// key may be an int or string
// value may be any value of any type
If $arr doesn't exist yet or is set to null or false, it will be created, so this is also an alternative way to create an array. This practice is however discouraged because if $arr already contains some value (e.g. string from request variable) then this value will stay in the place and [] may actually stand for string access operator. It is always better to initialize a variable by a direct assignment.

Note: As of PHP 7.1.0, applying the empty index operator on a string throws a fatal error. Formerly, the string was silently converted to an array.

Note: As of PHP 8.1.0, creating a new array from false value is deprecated. Creating a new array from null and undefined values is still allowed.

To change a certain value, assign a new value to that element using its key. To remove a key/value pair, call the unset() function on it.

<?php
$arr = array(5 => 1, 12 => 2);

$arr[] = 56;    // This is the same as $arr[13] = 56;
                // at this point of the script

$arr["x"] = 42; // This adds a new element to
                // the array with key "x"
                
unset($arr[5]); // This removes the element from the array

unset($arr);    // This deletes the whole array
?>
Note:

As mentioned above, if no key is specified, the maximum of the existing int indices is taken, and the new key will be that maximum value plus 1 (but at least 0). If no int indices exist yet, the key will be 0 (zero).

Note that the maximum integer key used for this need not currently exist in the array. It need only have existed in the array at some time since the last time the array was re-indexed. The following example illustrates:

<?php
// Create a simple array.
$array = array(1, 2, 3, 4, 5);
print_r($array);

// Now delete every item, but leave the array itself intact:
foreach ($array as $i => $value) {
    unset($array[$i]);
}
print_r($array);

// Append an item (note that the new key is 5, instead of 0).
$array[] = 6;
print_r($array);

// Re-index:
$array = array_values($array);
$array[] = 7;
print_r($array);
?>
The above example will output:

Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
)
Array
(
)
Array
(
    [5] => 6
)
Array
(
    [0] => 6
    [1] => 7
)

Useful functions
=================================
There are quite a few useful functions for working with arrays. See the array functions section.

Note:

The unset() function allows removing keys from an array. Be aware that the array will not be reindexed. If a true "remove and shift" behavior is desired, the array can be reindexed using the array_values() function.

<?php
$a = array(1 => 'one', 2 => 'two', 3 => 'three');
unset($a[2]);
/* will produce an array that would have been defined as
   $a = array(1 => 'one', 3 => 'three');
   and NOT
   $a = array(1 => 'one', 2 =>'three');
*/

$b = array_values($a);
// Now $b is array(0 => 'one', 1 =>'three')
?>
The foreach control structure exists specifically for arrays. It provides an easy way to traverse an array.

Array do's and don'ts 
=============================
Why is $foo[bar] wrong? ¶
Always use quotes around a string literal array index. For example, $foo['bar'] is correct, while $foo[bar] is not. But why? It is common to encounter this kind of syntax in old scripts:

<?php
$foo[bar] = 'enemy';
echo $foo[bar];
// etc
?>
This is wrong, but it works. The reason is that this code has an undefined constant (bar) rather than a string ('bar' - notice the quotes). It works because PHP automatically converts a bare string (an unquoted string which does not correspond to any known symbol) into a string which contains the bare string. For instance, if there is no defined constant named bar, then PHP will substitute in the string 'bar' and use that.

Warning
The fallback to treat an undefined constant as bare string issues an error of level E_NOTICE. This has been deprecated as of PHP 7.2.0, and issues an error of level E_WARNING. As of PHP 8.0.0, it has been removed and throws an Error exception.

Note: This does not mean to always quote the key. Do not quote keys which are constants or variables, as this will prevent PHP from interpreting them.

<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);
// Simple array:
$array = array(1, 2);
$count = count($array);
for ($i = 0; $i < $count; $i++) {
    echo "\nChecking $i: \n";
    echo "Bad: " . $array['$i'] . "\n";
    echo "Good: " . $array[$i] . "\n";
    echo "Bad: {$array['$i']}\n";
    echo "Good: {$array[$i]}\n";
}
?>
The above example will output:

Checking 0: 
Notice: Undefined index:  $i in /path/to/script.html on line 9
Bad: 
Good: 1
Notice: Undefined index:  $i in /path/to/script.html on line 11
Bad: 
Good: 1

Checking 1: 
Notice: Undefined index:  $i in /path/to/script.html on line 9
Bad: 
Good: 2
Notice: Undefined index:  $i in /path/to/script.html on line 11
Bad: 
Good: 2
More examples to demonstrate this behaviour:

<?php
// Show all errors
error_reporting(E_ALL);

$arr = array('fruit' => 'apple', 'veggie' => 'carrot');

// Correct
print $arr['fruit'];  // apple
print $arr['veggie']; // carrot

// Incorrect.  This works but also throws a PHP error of level E_NOTICE because
// of an undefined constant named fruit
// 
// Notice: Use of undefined constant fruit - assumed 'fruit' in...
print $arr[fruit];    // apple

// This defines a constant to demonstrate what's going on.  The value 'veggie'
// is assigned to a constant named fruit.
define('fruit', 'veggie');

// Notice the difference now
print $arr['fruit'];  // apple
print $arr[fruit];    // carrot

// The following is okay, as it's inside a string. Constants are not looked for
// within strings, so no E_NOTICE occurs here
print "Hello $arr[fruit]";      // Hello apple

// With one exception: braces surrounding arrays within strings allows constants
// to be interpreted
print "Hello {$arr[fruit]}";    // Hello carrot
print "Hello {$arr['fruit']}";  // Hello apple

// This will not work, and will result in a parse error, such as:
// Parse error: parse error, expecting T_STRING' or T_VARIABLE' or T_NUM_STRING'
// This of course applies to using superglobals in strings as well
print "Hello $arr['fruit']";
print "Hello $_GET['foo']";

// Concatenation is another option
print "Hello " . $arr['fruit']; // Hello apple
?>
When error_reporting is set to show E_NOTICE level errors (by setting it to E_ALL, for example), such uses will become immediately visible. By default, error_reporting is set not to show notices.

As stated in the syntax section, what's inside the square brackets ('[' and ']') must be an expression. This means that code like this works:

<?php
echo $arr[somefunc($bar)];
?>
This is an example of using a function return value as the array index. PHP also knows about constants:

<?php
$error_descriptions[E_ERROR]   = "A fatal error has occurred";
$error_descriptions[E_WARNING] = "PHP issued a warning";
$error_descriptions[E_NOTICE]  = "This is just an informal notice";
?>
Note that E_ERROR is also a valid identifier, just like bar in the first example. But the last example is in fact the same as writing:

<?php
$error_descriptions[1] = "A fatal error has occurred";
$error_descriptions[2] = "PHP issued a warning";
$error_descriptions[8] = "This is just an informal notice";
?>
because E_ERROR equals 1, etc.

So why is it bad then?
At some point in the future, the PHP team might want to add another constant or keyword, or a constant in other code may interfere. For example, it is already wrong to use the words empty and default this way, since they are reserved keywords.

Note: To reiterate, inside a double-quoted string, it's valid to not surround array indexes with quotes so "$foo[bar]" is valid. See the above examples for details on why as well as the section on variable parsing in strings.

Converting to array ¶
For any of the types int, float, string, bool and resource, converting a value to an array results in an array with a single element with index zero and the value of the scalar which was converted. In other words, (array)$scalarValue is exactly the same as array($scalarValue).

If an object is converted to an array, the result is an array whose elements are the object's properties. The keys are the member variable names, with a few notable exceptions: integer properties are unaccessible; private variables have the class name prepended to the variable name; protected variables have a '*' prepended to the variable name. These prepended values have NUL bytes on either side. Uninitialized typed properties are silently discarded.

<?php

class A {
    private $B;
    protected $C;
    public $D;
    function __construct()
    {
        $this->{1} = null;
    }
}

var_export((array) new A());
?>
The above example will output:

array (
  '' . "\0" . 'A' . "\0" . 'B' => NULL,
  '' . "\0" . '*' . "\0" . 'C' => NULL,
  'D' => NULL,
  1 => NULL,
)
These NUL can result in some unexpected behaviour:

<?php

class A {
    private $A; // This will become '\0A\0A'
}

class B extends A {
    private $A; // This will become '\0B\0A'
    public $AA; // This will become 'AA'
}

var_dump((array) new B());
?>
The above example will output:

array(3) {
  ["BA"]=>
  NULL
  ["AA"]=>
  NULL
  ["AA"]=>
  NULL
}

The above will appear to have two keys named 'AA', although one of them is actually named '\0A\0A'.

Converting null to an array results in an empty array.
==========================================

Comparing 
===================
It is possible to compare arrays with the array_diff() function and with array operators.


Array unpacking 
====================
An array prefixed by ... will be expanded in place during the definition of the array. Only arrays and objects which implement Traversable can be expanded. Array unpacking with ... is available as of PHP 7.4.0.

It's possible to expand multiple times, and add normal elements before or after the ... operator:

Example #9 Simple array unpacking

<?php
// Using short array syntax.
// Also, works with array() syntax.
$arr1 = [1, 2, 3];
$arr2 = [...$arr1]; //[1, 2, 3]
$arr3 = [0, ...$arr1]; //[0, 1, 2, 3]
$arr4 = [...$arr1, ...$arr2, 111]; //[1, 2, 3, 1, 2, 3, 111]
$arr5 = [...$arr1, ...$arr1]; //[1, 2, 3, 1, 2, 3]

function getArr() {
  return ['a', 'b'];
}
$arr6 = [...getArr(), 'c' => 'd']; //['a', 'b', 'c' => 'd']
?>
Unpacking an array with the ... operator follows the semantics of the array_merge() function. That is, later string keys overwrite earlier ones and integer keys are renumbered:

Example #10 Array unpacking with duplicate key

<?php
// string key
$arr1 = ["a" => 1];
$arr2 = ["a" => 2];
$arr3 = ["a" => 0, ...$arr1, ...$arr2];
var_dump($arr3); // ["a" => 2]

// integer key
$arr4 = [1, 2, 3];
$arr5 = [4, 5, 6];
$arr6 = [...$arr4, ...$arr5];
var_dump($arr6); // [1, 2, 3, 4, 5, 6]
// Which is [0 => 1, 1 => 2, 2 => 3, 3 => 4, 4 => 5, 5 => 6]
// where the original integer keys have not been retained.
?>
Note:

Keys that are neither integers nor strings throw a TypeError. Such keys can only be generated by a Traversable object.

Note:

Prior to PHP 8.1, unpacking an array which has a string key is not supported:

<?php

$arr1 = [1, 2, 3];
$arr2 = ['a' => 4];
$arr3 = [...$arr1, ...$arr2];
// Fatal error: Uncaught Error: Cannot unpack array with string keys in example.php:5

$arr4 = [1, 2, 3];
$arr5 = [4, 5];
$arr6 = [...$arr4, ...$arr5]; // works. [1, 2, 3, 4, 5]
?>

Examples 

The array type in PHP is very versatile. Here are some examples:

<?php
// This:
$a = array( 'color' => 'red',
            'taste' => 'sweet',
            'shape' => 'round',
            'name'  => 'apple',
            4        // key will be 0
          );

$b = array('a', 'b', 'c');

// . . .is completely equivalent with this:
$a = array();
$a['color'] = 'red';
$a['taste'] = 'sweet';
$a['shape'] = 'round';
$a['name']  = 'apple';
$a[]        = 4;        // key will be 0

$b = array();
$b[] = 'a';
$b[] = 'b';
$b[] = 'c';

// After the above code is executed, $a will be the array
// array('color' => 'red', 'taste' => 'sweet', 'shape' => 'round', 
// 'name' => 'apple', 0 => 4), and $b will be the array 
// array(0 => 'a', 1 => 'b', 2 => 'c'), or simply array('a', 'b', 'c').
?>
Example #11 Using array()

<?php
// Array as (property-)map
$map = array( 'version'    => 4,
              'OS'         => 'Linux',
              'lang'       => 'english',
              'short_tags' => true
            );
            
// strictly numerical keys
$array = array( 7,
                8,
                0,
                156,
                -10
              );
// this is the same as array(0 => 7, 1 => 8, ...)

$switching = array(         10, // key = 0
                    5    =>  6,
                    3    =>  7, 
                    'a'  =>  4,
                            11, // key = 6 (maximum of integer-indices was 5)
                    '8'  =>  2, // key = 8 (integer!)
                    '02' => 77, // key = '02'
                    0    => 12  // the value 10 will be overwritten by 12
                  );
                  
// empty array
$empty = array();         
?>
Example #12 Collection

<?php
$colors = array('red', 'blue', 'green', 'yellow');

foreach ($colors as $color) {
    echo "Do you like $color?\n";
}

?>
The above example will output:

Do you like red?
Do you like blue?
Do you like green?
Do you like yellow?
Changing the values of the array directly is possible by passing them by reference.

Example #13 Changing element in the loop

<?php
foreach ($colors as &$color) {
    $color = strtoupper($color);
}
unset($color); /* ensure that following writes to
$color will not modify the last array element */

print_r($colors);
?>
The above example will output:

Array
(
    [0] => RED
    [1] => BLUE
    [2] => GREEN
    [3] => YELLOW
)
This example creates a one-based array.

Example #14 One-based index

<?php
$firstquarter  = array(1 => 'January', 'February', 'March');
print_r($firstquarter);
?>
The above example will output:

Array 
(
    [1] => 'January'
    [2] => 'February'
    [3] => 'March'
)
Example #15 Filling an array

<?php
// fill an array with all items from a directory
$handle = opendir('.');
while (false !== ($file = readdir($handle))) {
    $files[] = $file;
}
closedir($handle); 
?>
Arrays are ordered. The order can be changed using various sorting functions. See the array functions section for more information. The count() function can be used to count the number of items in an array.

Example #16 Sorting an array

<?php
sort($files);
print_r($files);
?>
Because the value of an array can be anything, it can also be another array. This enables the creation of recursive and multi-dimensional arrays.

Example #17 Recursive and multi-dimensional arrays

<?php
$fruits = array ( "fruits"  => array ( "a" => "orange",
                                       "b" => "banana",
                                       "c" => "apple"
                                     ),
                  "numbers" => array ( 1,
                                       2,
                                       3,
                                       4,
                                       5,
                                       6
                                     ),
                  "holes"   => array (      "first",
                                       5 => "second",
                                            "third"
                                     )
                );

// Some examples to address values in the array above 
echo $fruits["holes"][5];    // prints "second"
echo $fruits["fruits"]["a"]; // prints "orange"
unset($fruits["holes"][0]);  // remove "first"

// Create a new multi-dimensional array
$juices["apple"]["green"] = "good"; 
?>
Array assignment always involves value copying. Use the reference operator to copy an array by reference.

<?php
$arr1 = array(2, 3);
$arr2 = $arr1;
$arr2[] = 4; // $arr2 is changed,
             // $arr1 is still array(2, 3)
             
$arr3 = &$arr1;
$arr3[] = 4; // now $arr1 and $arr3 are the same
?>
