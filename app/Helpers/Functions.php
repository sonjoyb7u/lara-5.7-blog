<?php

function getAlertMessage($type, $message) {
    session()->flash('type', $type);
    session()->flash('message', $message);

}
