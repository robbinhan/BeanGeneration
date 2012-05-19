<?php
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

        $str = "<?php\nclass ".ucwords($className)." extends ".ucwords($extend)."\n{\n";
        foreach	($properties as $p)
        {
            $str .= "    private $".$p." = null;\n";
        }

        //set
        foreach	($properties as $p)
        {
            if(false !== strstr($p,"_"))
            {
                $p = str_replace("_","",$p);
            }
            $str .= "    public function  set".ucwords($p)."($".$p.")\n    {\n         ".'$this->'."$p = ".'$'."$p;\n    }\n";
        }

        //get
        foreach	($properties as $p)
        {
            if(false !== strstr($p,"_"))
            {
                $p = str_replace("_","",$p);
            }
            $str .= "    public function  get".ucwords($p)."()\n    {\n        return ".'$this->'.$p.";\n    }\n";
        }

        $str .= "}\n";

        $this->str = $str;
    }

    public function writeFile($dirName = "")
    {
        $fp = fopen($dirName."./".ucwords($this->className).'.php' ,'w');
        if($fp)
        {
            fwrite($fp, $this->str );
        }
        fclose($fp);
    }
}
