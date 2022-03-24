<?php

function iconHtml(string $icon): string {
    return '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">'.config("icons.$icon").'</svg>';
}
