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


namespace mod_appsanywhere\event;

defined('MOODLE_INTERNAL') || die();

/**
 * The mod_appsanywhere instance viewed event class
 *
 * If the view mode needs to be stored as well, you may need to
 * override methods get_url() and get_legacy_log_data(), too.
 *
 * @package    mod_appsanywhere
 * @copyright  2017 Consorci de Serveis Universitaris de Catalunya CSUC
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class course_module_viewed extends \core\event\course_module_viewed {

    /**
     * Initialize the event
     */
    protected function init() {
        $this->data['objecttable'] = 'appsanywhere';
        parent::init();
    }
}
