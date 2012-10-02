<?php
namespace beangen\lib;
class Parse
{
    private $config    = array();
    private $str       = null;
    private $className = null;

    public function __construct($configFile)
    {
        $this->config = require $configFile;
    }

    public function parseConfig()
    {
        $this->className = $className  = $this->config['className'];
        $properties = $this->config['properties'];
        $extend     = $this->config['extend'];
        $interface  = $this->config['interface'];

		$str = "<?php".PHP_EOL."class ".ucwords($className);
		if ($extend) {
			$str .= " extends ".ucwords($extend);
		}

		if ($interface) {
			$str .= " implements ".ucwords($interface).PHP_EOL."{".PHP_EOL;
		}

        foreach	($properties as $p) {
            $str .= "    private $".$p." = null;".PHP_EOL;
        }

        //set
        foreach	($properties as $p) {
			list($f,$p) = explode('_',$p);
			$str .= "    public function  set".ucwords($p)."($".$p.")".PHP_EOL.
				"    {".PHP_EOL."         ".'$this->'."$p = ".'$'."$p;".PHP_EOL."    }".PHP_EOL;
        }

        //get
        foreach	($properties as $p) {
			list($f,$p) = explode('_',$p);
			$str .= "    public function  get".ucwords($p)."()".PHP_EOL.
				"    {".PHP_EOL."        return ".'$this->'.$p.";".PHP_EOL."    }".PHP_EOL;
        }

        $str .= "}".PHP_EOL;

        $this->str = $str;
    }

    public function writeFile($dirName = "")
    {
        $fp = fopen($dirName."./".ucwords($this->className).'.php' ,'w');
        if ($fp) {
            fwrite($fp, $this->str);
        }
        fclose($fp);
    }
}
