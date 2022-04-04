Brief Case of PHP Syntax
======================

php file
=======

If you want your file to be interpreted as php then your file must end with that php and not with that html. php files can also have html, CSS, JavaScript in them.

php tag
=======

php opening and closing tag is <?php ?> and php interpreter interpreted the code between opening and closing tag. But if your file entirely contain 100 percent php code then you do not need the closing tag and that is to make sure that no accidental  whitespace or new lines are added after the php closing tag which could mess up your website.

Semicolon
=========

php closing tag will automatically  assume the semicolon on the last  line.
So basically you do not need semicolon the Last line of php statement. This is useful when you are embedding php with html and it's just a single line in those case s you do not need the semicolon but if you have multiple lines though it's a good idea to stay consistent and just use the semicolon.

Php code execute
================
You could execute your php script within your terminal. If you open xampp control panel and click on shell on here this will bring up the terminal. We need to cd into our project directory which is htdocs program with project name and then you could run php files using the php command and that will give you the output. So you could basically execute your php code in command line if you want.

You could also use print to print something which essentially is the same thing as echo.

Difference of echo and print
==========================
Print has a return value of 1 for that reason here I give an example like
<?=  print "hello world" ?>
I do echo and then print that will print out hello world and then  append  one at the end because this expression itself return 1 this means that print could be used within expressions while echo can not for example if we did this the other way  print echo "hello world" and this would not work and we would get the syntax error.
Echo could print multiple values while print can not.
for example
echo "abc", "xyz";//works
print  "abc", "xyz";//does not works
Echo is marginally faster than print.

Variable
=======
Variable declared with dollar sign($).First character start with a-zA-Z_ and then other character from a-zA-Z_0-9.No space and no special character are allowed. This is a object so you do not assign $this. 

Variables in php are by default assign by value .Let me show you what I mean
so if we have a variable called x which equals to 1and then we have a variable y which equals o x and then  we change the value of x to 3 and then we print y what will be printed is 1 and not 3 that is because variables are assigned by value.On the other handif you actually wanted y to change whatever x cahnges then we need to assign variables by reference instead of value.  Assign a variable by reference,you need to add ampersand righ here so now y is equal to  reference variable x so anytime x cahnges the y will also change and now y is equal to 3.

Comments
==========
There are two types of single line comments that are // your comments and  #your comments.
Multiline comments is /* comment here */. Nested multiple comments are not allowed.
