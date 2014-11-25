<?php
namespace Helper\Manager;

class ManagerFormTabs {
    public function render (Array $args, Array $options) {
        $buffer = '';
        $metadata = $options['metadata'];
        $buffer .= '
            <div class="ui top attached tabular menu container">';

        if (count($metadata['tabs']) == 0) {
            $buffer .= '<a class="active item bg-image align-left" data-tab="Main">Main</a>';
        }
        $active = 'active align-left ';
        foreach ($metadata['tabs'] as $tab) {
            $buffer .= '<a class="' . $active . 'item" data-tab="' . $tab . '">' . $tab . '</a>';
            $active = '';
        }
        $buffer .= '
            </div>';

        return $buffer;
    }
}