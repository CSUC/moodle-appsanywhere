<?php
// This file is part of AppsAnywhere plugin.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.

/**
 *
 *
 * @package    mod_appsanywhere
 * @copyright  2017 Consorci de Serveis Universitaris de Catalunya CSUC
 * @author     Miguel Angel Flores (miguel [dot] angel [dot] flores [at] csuc [dot] cat)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');

/**
 * Module instance settings form
 *
 * @package    mod_appsanywhere
 * @copyright  2016 Your Name <your@email.address>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_appsanywhere_mod_form extends moodleform_mod {

    /**
     * Defines forms elements
     */
    public function definition() {
        global $CFG;

        $mform = $this->_form;

        // Adding the "general" fieldset, where all the common settings are showed.
        $mform->addElement('header', 'general', get_string('general', 'form'));

        // Adding the standard "name" field.
        $mform->addElement('text', 'name', get_string('appsanywherename', 'appsanywhere'), array('size' => '64'));
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEANHTML);
        }
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        $mform->addHelpButton('name', 'appsanywherename', 'appsanywhere');

        // Adding the standard "intro" and "introformat" fields.
        if ($CFG->branch >= 29) {
            $this->standard_intro_elements();
        } else {
            $this->add_intro_editor();
        }

        // Adding the rest of appsanywhere settings, spreading all them into this fieldset
        // ... or adding more fieldsets ('header' elements) if needed for better logic.
        //$mform->addElement('static', 'label1', 'appsanywheresetting1', 'Your appsanywhere fields go here. Replace me!');

        $mform->addElement('header', 'appsanywherefieldset', get_string('appsanywherefieldset', 'appsanywhere'));
        $mform->addElement('textarea', 'shortcut', get_string("introtext", "appsanywhere"), 'wrap="virtual" rows="10" cols="90"');
        $mform->addElement('text', 'icon', get_string('appsanywhereicon', 'appsanywhere'), array('size' => '90'));
        // $mform->addElement('static', 'label2', 'appsanywheresetting2', 'Your appsanywhere fields go here. Replace me!');

        // Add standard grading elements.
        $this->standard_grading_coursemodule_elements();

        // Add standard elements, common to all modules.
        $this->standard_coursemodule_elements();

        // Add standard buttons, common to all modules.
        $this->add_action_buttons();
    }
}
