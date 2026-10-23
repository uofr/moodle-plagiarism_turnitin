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
 * Class turnitin_hsuforum
 *
 * @package   plagiarism_turnitin
 */
class turnitin_hsuforum {
    /**
     * @var string
     */
    private $modname;
    /**
     * @var string
     */
    public $gradestable;
    /**
     * @var string
     */
    public $filecomponent;

    /**
     * The constructor
     */
    public function __construct() {
        $this->modname = 'hsuforum';
        $this->gradestable = $this->modname.'_grades';
        $this->filecomponent = 'mod_'.$this->modname;
    }

    public function is_tutor($context) {
        return has_capability($this->get_tutor_capability(), $context);
    }

    public function get_tutor_capability() {
        return 'mod/'.$this->modname.':grade';
    }

    public function get_author($itemid) {
        return;
    }

    public function set_content($linkarray) {
        return $linkarray['content'];
    }

    public function create_file_event($params) {
        return \mod_hsuforum\event\assessable_uploaded::create($params);
    }

    public function create_text_event($params) {
        return \mod_hsuforum\event\assessable_uploaded::create($params);
    }

    public function user_enrolled_on_course($context, $userid) {
        return has_capability('mod/'.$this->modname.':replypost', $context, $userid);
    }

    public function initialise_post_date($moduledata) {
        return 0;
    }

    public function get_discussionid($forumdata) {
        global $CFG;
        require_once($CFG->dirroot.'/mod/hsuforum/lib.php');

        list($querystrid, $discussionid, $reply, $edit, $delete) = explode('_', $forumdata);

        if (empty($discussionid)) {
            $parent = '';
            if ($reply != 0) {
                $parent = hsuforum_get_post_full($reply);
            } else if ($edit != 0) {
                $parent = hsuforum_get_post_full($edit);
            } else if ($delete != 0) {
                $parent = hsuforum_get_post_full($delete);
            }

            if (!empty($parent)) {
                $discussionid = $parent->discussion;
            }
        }

        return $discussionid;
    }
}