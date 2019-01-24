<?php
$a=Hash::make('5lWmkbjMSs');
echo $a;

if(Hash::check('5lWmkbjMSs', bcrypt('5lWmkbjMSs')))
{
    echo 'yes';
};


echo '<br>';
if (Hash::check('5lWmkbzjMSs', $a))
{
    echo 'yes';
};


?>