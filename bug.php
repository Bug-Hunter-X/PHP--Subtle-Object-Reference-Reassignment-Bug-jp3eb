In PHP, a common yet subtle error arises when dealing with references and objects.  Consider this scenario:

```php
class MyClass {
    public $value = 0;
}

function modifyObject(MyClass &$obj) {
    $obj = new MyClass(); // This reassigns the reference
    $obj->value = 10;
}

$myObject = new MyClass();
modifyObject($myObject);
echo $myObject->value; // This will still output 0, not 10
```

The issue lies in the `modifyObject` function.  While it seems to modify the object, the line `$obj = new MyClass();` doesn't modify the original object passed by reference; instead, it reassigns the `$obj` variable *within the function* to a completely new object.  The original `$myObject` remains untouched.