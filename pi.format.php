<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * Format Text Plugin
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Plugin
 * @author		EllisLab Docs
 * @link		http://expressionengine.com/user_guide/development/plugins.html
 */

$plugin_info = array(
	'pi_name'		=> 'Format',
	'pi_version'	=> '1.0.0',
	'pi_author'		=> 'EllisLab Docs',
	'pi_author_url'	=> 'http://expressionengine.com/user_guide/development/plugins.html',
	'pi_description'=> 'Formats text',
	'pi_usage'		=> Format::usage()
);

 class Format
{
  var $return_data;

  function format()
  {
    $this->EE =& get_instance();
    $parameter = $this->EE->TMPL->fetch_param('type');

    switch ($parameter)
    {
      case "uppercase":
        $this->return_data = strtoupper($this->EE->TMPL->tagdata);
        break;
      case "lowercase":
        $this->return_data = strtolower($this->EE->TMPL->tagdata);
        break;
      case "bold" :
        $this->return_data = "<strong>".$this->EE->TMPL->tagdata."</strong>";
        break;
      case "italic":
        $this->return_data = "<i>".$this->EE->TMPL->tagdata."</i>";
        break;
      default:
        // did not specify type, return data untouched
        $this->return_data = $this->EE->TMPL->tagdata;
        break;
    }
  }
	// ----------------------------------------------------------------
	
	/**
	 * Plugin Usage
	 */
	public static function usage()
	{
		ob_start();
?>
  {exp:format type="upper"}This should be converted to uppercase{/exp:format}
  
  Format text to be bold, upper, lower case, italic
  
  type options: uppercase, lowercase, bold, italic
<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}


/* End of file pi.format.php */
/* Location: /system/expressionengine/third_party/format/pi.format.php */