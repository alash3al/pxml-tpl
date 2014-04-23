<?php
/**
 * PXML
 * 
 * A smart tiny and lightest OO php templating system .
 * Only it replaces some words with others ( uses "str_ireplace()" ) .
 * 
 * @package     PXML
 * @author      Mohammed Alashaal 
 *              (<fb.com/alash3al> & <fb.com/hawy.code>)
 * @copyright   2014
 * @version     1.0
 * @license     MIT
 * @access      public
 */
class pxml
{
    protected $file;
    protected $vars = array();
    var $pxml = array (
        
        // php
        '<php>'         =>  ' <?php ',
        '</php>'        =>  ' ?> ',

        // foreach
        '<foreach>'     =>  ' <?php foreach( ',
        '</foreach>'    =>  ' ): ?> ',
        '</endforeach>' =>  ' <?php endforeach; ?>',

        // while
        '<while>'       =>  ' <?php while( ',
        '</while>'      =>  ' ): ?> ',
        '</endwhile>'   =>  ' <?php endwhile; ?>',

        // for
        '<for>'         =>  ' <?php for( ',
        '</for>'        =>  ' ): ?> ',
        '</endfor>'     =>  ' <?php endfor; ?>',

        // print / echo
        '<print>'       =>  ' <?php echo ',
        '</print>'      =>  ' ; ?> ',

        // if,elseif,else
        '<if>'          =>  ' <?php if(  ',
        '</if>'         =>  ' ): ?> ',
        '<elseif>'      =>  ' <?php elseif( ',
        '</elseif>'     =>  '  ): ?> ',
        '<else>'        =>  ' <?php else: ?> ',
        '</else>'       =>  '  ',
        '</endif>'      =>  ' <?php endif; ?> '
    );

    // --------------------------------------

    /**
     * Add your own replacements
     * 
     * @param array $data
     * @return void
     */
    function add(array $data)
    {
        $this->pxml = array_merge($this->pxml, $data);
    }

    // --------------------------------------

    /**
     * Render a file
     * 
     * @param string $file
     * @param array $vars
     * @return bool
     */
    function render($file, array $vars = array())
    {
        if(!is_file($file)) return FALSE;
        
        extract($vars, EXTR_SKIP);
        $this->file = $file;
        eval( '?>' . $this->compile() );
        
        return TRUE;
    }
    
    // --------------------------------------

    /**
     * Compile a file
     * 
     * @return string
     */
    protected function compile()
    {
        $d = file_get_contents($this->file);
        return str_ireplace (
            array_keys($this->pxml),
            array_values($this->pxml),
            $d
        );
    }

    // --------------------------------------
    
    function __set($k, $v)
    {
        $this->vars[$k] = $v;
    }

    // --------------------------------------
    
    function __get($k)
    {
        return @$this->vars[$k];
    }

    // --------------------------------------
    
    function __unset($k)
    {
        unset($this->vars[$k]);
    }

    // --------------------------------------
    
    function __isset($k)
    {
        return isset($this->vars[$k]);
    }

    // --------------------------------------
    
    function __call($m, $a)
    {
        return call_user_func_array(array($this->vars, $m), $a);
    }
}
