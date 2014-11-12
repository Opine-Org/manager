<?php
return function ($args, $named) {
    $modifiedMarkup = '<abbr class="time" title="">Not yet saved</abbr>';
    if (!empty($named['modified'])) {
        $modifiedMarkup = '<abbr class="time" data-livestamp="' . $named['modified'] . '"></abbr>';
    }
    return '
        <div class="ui teal medium buttons submit">
            <span><i class="time icon"></i> ' . $modifiedMarkup . '</span>
            <div class="ui button manager submit">Save</div><div class="ui teal dropdown icon button">
                <i class="dropdown icon"></i>
                <div class="menu">
                    <div class="item" data-value="save-another"><i class="plus icon"></i>Save, Add Another</div>
                    <div class="item" data-value="save-copy"><i class="copy icon"></i>Save As Copy</div>
                    <div class="item" data-value="save-delete"><i class="delete icon"></i>Delete</div>
                </div>
            </div>
        </div>';
};