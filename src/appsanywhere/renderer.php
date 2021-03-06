<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


/**
 *
 * This file contains a custom renderer class used by the AppsAnywhere module.
 *
 * @package    mod_appsanywhere
 * @copyright  2020 Consorci de Serveis Universitaris de Catalunya CSUC
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

        global $CFG, $COURSE;

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
        $html .= html_writer::tag('button', get_string('appsanywherebutton', 'appsanywhere'),
                                array('type' => 'button' , 'class' => 'btn btn-primary', 'onclick' => $url ));
        $html .= html_writer::end_div();
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
