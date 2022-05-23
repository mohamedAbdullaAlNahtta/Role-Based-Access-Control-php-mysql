
<?php
function foo()
{
    $numargs = func_num_args();
    echo "Number of arguments: $numargs <br>";
    $arg_list = func_get_args();
    for ($i = 0; $i < $numargs; $i++) {
        echo "Argument $i is: " . $arg_list[$i] . "<br>";
    }
}

foo(1, 2, 3, 4, 5, 6);
?>
