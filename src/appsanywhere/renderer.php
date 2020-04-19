<?php
/** This file is part of AppsAnywhere plugin.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 *
 *
 * @package    mod_appsanywhere
 * @copyright  2017 Consorci de Serveis Universitaris de Catalunya CSUC
 * @author     Miguel Angel Flores (miguel [dot] angel [dot] flores [at] csuc [dot] cat)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * A custom renderer class that extends the plugin_renderer_base and is used by the appsanywhere module.
 *
 * @package    mod_appsanywhere
 * @copyright  2017 Consorci de Serveis Universitaris de Catalunya CSUC
 * @author     Miguel Angel Flores (miguel [dot] angel [dot] flores [at] csuc [dot] cat)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_appsanywhere_renderer extends plugin_renderer_base {
    /**
     * Returns HTML to display the appsanywhere details
     *
     * @param instance $appsanywhere
     * @param integer $cm
     * @param boolean $printaccessbutton
     * @return array
     */
    public function display_appsanywhere_detail (&$appsanywhere, $cm) {

        global $CFG, $OUTPUT, $COURSE;

        //$html = html_writer::start_tag('form', array('action' => $appsanywhere->shorcut, 'method' => 'get');
        $url = 'location.href=\''. $appsanywhere->shortcut .'\'';
       
	if (empty($appsanywhere->icon)) {
		$param = array( 'src' => $CFG->wwwroot.'/mod/appsanywhere/pix/package.png', 'alt' => 'AppsAnywhere',
                             'width' => '300' );
	} else {
		 $param = array( 'src' => $appsanywhere->icon, 'alt' => 'AppsAnywhere',
                             'height' => '100' );
	}	 
        
        $html = html_writer::start_tag('div', array('align' => 'center'));

        $html .= html_writer::empty_tag ( 'img', $param );

        $html .= html_writer::tag('br', '');
       
        $html .= html_writer::tag('button', get_string('appsanywherebutton', 'appsanywhere'), array('type' => 'button' , 'class' => 'btn btn-primary', 'onclick' => $url ));     
        //$html .= html_writer::end_tag('form');        
       
        $html .=  html_writer::end_div();

        $html .= html_writer::tag('br', '');
       
        $a = "<a href=". get_config('appsanywhere', 'serverurl'). " target=\"_blank\">AppsAnywhere Client download page</a>";

        $html .= get_string('appsanywherename_help', 'appsanywhere', $a);


        return $html;
    }

    /**
     * Returns HTML to display the appsanywhere help
     *
     * @param instance $appsanywhere
     * @param integer $cm
     * @return array
     */
    public function display_appsanywhere_help($appsanywhere, $cm) {

        $a = "<a href=". get_config('appsanywhere', 'serverurl'). "target=\"_blank\">AppsAnywhere Client download page</a>";

        $html = get_string('appsanywherehelp', 'appsanywhere', $a);

        return $html;

    }
}
