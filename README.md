PHTML TPL
==========
A smart tiny and lightest OO php templating system . <br />
Only it replaces some words with others ( uses "str_ireplace()" ) . <br />
- No regex . <br />
- No complex code . <br />
- Very light (the lightest) . <br />
- Write php as html . <br />
- Self Container for ( vars & methods ) . <br />
- Object Oriented . <br />

***

Usage
=========

**Config it:**
```php
<?php

// load it
require_once 'path/tp/phtml.php';

// start it
$phtml = new phtml;

// ad your own replacements ?
$phtml->add(array(
    '(php):'    =>  ' <?php ',
    ':(php)'    =>  ' ?> '
));

// render a file (and pass vars "optional")
$phtml->render('path/to/file.html', array('var' => 'value'));

```

**An PHTML file**
```php
    
    
    <!-- 
        PHP HTML MIX
        The Lightest, why ?
        As it is only replaces some words with others,
        and no more REGEXP :-) .
     -->
     
    <h1> <print>$c</print> </h1>
    <php> $this->alert = 'hi' </php>
    <print> $this->alert </print>
    
    <br />
    
    <php> $array = array( 1,2,3,4 ); </php>
    <foreach> $array as $v </foreach>
        <print> $v </print>
    </endforeach>
    
    <br />
    
    <php> $array = array( 1,2,3,4 ); </php>
    <if> !empty($xxx) </if>
        <print> "HI 1" </print>
    <elseif> !empty($yyyy) </elseif>
        <print> "HI 2" </print>
    <else> 
        <print> "HI 3" </print>
    </endif>
    
    <br />
    
    
    <for>$i=0; $i <= 5; ++$i</for>
    <print>$i</print>
    </endfor>
    
    <br />
    
    <php>$x = 4</php>
    <while>$x < 5</while>
    <print>$x, " - " , "HI"</print>
    <php>++$x</php>
    </endwhile>
```
